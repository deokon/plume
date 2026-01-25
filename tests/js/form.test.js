import { describe, it, expect, vi, beforeEach } from 'vitest'
import formPlugin from '../../resources/js/alpine/form.js'

describe('Form Plugin', () => {
    let Alpine
    let instance

    beforeEach(() => {
        Alpine = {
            data: vi.fn((name, callback) => {
                Alpine.components = Alpine.components || {}
                Alpine.components[name] = callback
            }),
            evaluate: vi.fn()
        }
        vi.stubGlobal('fetch', vi.fn())
        vi.stubGlobal('document', {
            querySelector: vi.fn(() => ({ getAttribute: () => 'token', value: 'token' }))
        })
    })

    const createInstance = (initialData = {}, config = {}) => {
        formPlugin(Alpine)
        const data = Alpine.components['form'](initialData, config)
        data.$el = { 
            tagName: 'DIV',
            addEventListener: vi.fn(),
            querySelector: vi.fn()
        }
        data.$watch = vi.fn((key, cb) => {
            data._watches = data._watches || {}
            data._watches[key] = cb
        })
        data.$dispatch = vi.fn()
        return data
    }

    it('initializes with default state', () => {
        instance = createInstance({ name: '' })
        expect(instance.data.name).toBe('')
        expect(instance.processing).toBe(false)
        expect(instance.isDirty).toBe(false)
    })

    it('tracks dirty state', () => {
        instance = createInstance({ name: 'John' })
        instance.init()
        
        instance.data.name = 'Jane'
        // Manually trigger watch
        instance._watches['data'](instance.data)
        
        expect(instance.isDirty).toBe(true)
        
        instance.data.name = 'John'
        instance._watches['data'](instance.data)
        expect(instance.isDirty).toBe(false)
    })

    it('handles successful submission', async () => {
        const mockResult = { success: true, message: 'Saved!', data: { id: 1 } }
        fetch.mockResolvedValue({
            ok: true,
            json: () => Promise.resolve(mockResult)
        })

        instance = createInstance({ name: 'Test' }, { url: '/api/test' })
        await instance.submit()

        expect(instance.wasSuccessful).toBe(true)
        expect(instance.message).toBe('Saved!')
        expect(instance.data.id).toBe(1)
        expect(instance.isDirty).toBe(false)
        expect(instance.$dispatch).toHaveBeenCalledWith('form-success', mockResult)
    })

    it('handles failure submission', async () => {
        const mockResult = { success: false, message: 'Error!', errors: { name: ['Required'] } }
        fetch.mockResolvedValue({
            ok: false,
            status: 422,
            json: () => Promise.resolve(mockResult)
        })

        instance = createInstance({ name: '' }, { url: '/api/test' })
        await instance.submit()

        expect(instance.hasFailed).toBe(true)
        expect(instance.message).toBe('Error!')
        expect(instance.errors.name).toEqual(['Required'])
        expect(instance.hasError('name')).toBe(true)
        expect(instance.getError('name')).toBe('Required')
    })

    it('resets data', () => {
        instance = createInstance({ name: 'Original' })
        instance.init()
        instance.data.name = 'Changed'
        
        instance.resetData()
        expect(instance.data.name).toBe('Original')
    })

    it('prevents submission when busy or already processing', async () => {
        instance = createInstance({ name: 'Test' }, { url: '/api/test' })
        instance.init()
        
        // Test busy
        instance.busy = true
        await instance.submit()
        expect(instance.processing).toBe(false)
        expect(fetch).not.toHaveBeenCalled()

        // Test already processing
        instance.busy = false
        instance.processing = true
        await instance.submit()
        expect(fetch).not.toHaveBeenCalled()
    })

    it('detects spoofed methods from _method input', () => {
        instance = createInstance({ name: 'Test' })
        instance.$el.tagName = 'FORM'
        instance.$el.method = 'POST'
        instance.$el.querySelector = vi.fn((selector) => {
            if (selector === 'input[name="_method"]') {
                return { value: 'PUT' }
            }
            return null
        })
        
        instance.init()
        expect(instance._config.method).toBe('PUT')
    })

    it('triggers onSuccess callbacks', async () => {
        const successCallback = vi.fn()
        const mockResult = { success: true, message: 'Ok' }
        fetch.mockResolvedValue({
            ok: true,
            json: () => Promise.resolve(mockResult)
        })

        // Function callback
        instance = createInstance({}, { url: '/api', onSuccess: successCallback })
        await instance.submit()
        expect(successCallback).toHaveBeenCalledWith(mockResult)

        // String expression callback
        instance = createInstance({}, { url: '/api', onSuccess: 'alert("Ok")' })
        await instance.submit()
        expect(Alpine.evaluate).toHaveBeenCalledWith(instance.$el, 'alert("Ok")', { scope: { result: mockResult } })
    })

    it('triggers onError callbacks', async () => {
        const errorCallback = vi.fn()
        const mockResult = { success: false, message: 'Fail' }
        fetch.mockResolvedValue({
            ok: false,
            json: () => Promise.resolve(mockResult)
        })

        // Function callback
        instance = createInstance({}, { url: '/api', onError: errorCallback })
        await instance.submit()
        expect(errorCallback).toHaveBeenCalledWith(mockResult)

        // String expression callback
        instance = createInstance({}, { url: '/api', onError: 'console.error("Fail")' })
        await instance.submit()
        expect(Alpine.evaluate).toHaveBeenCalledWith(instance.$el, 'console.error("Fail")', { scope: { result: mockResult } })
    })
})
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
            })
        }
        vi.stubGlobal('fetch', vi.fn())
        vi.stubGlobal('document', {
            querySelector: vi.fn(() => ({ getAttribute: () => 'token', value: 'token' }))
        })
    })

    const createInstance = (initialData = {}, config = {}) => {
        formPlugin(Alpine)
        const data = Alpine.components['form'](initialData, config)
        data.$el = { tagName: 'DIV' }
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
})

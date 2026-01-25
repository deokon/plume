import { describe, it, expect, vi, beforeEach } from 'vitest'
import modal from '../../resources/js/alpine/modal.js'

describe('Modal Plugin', () => {
    let Alpine

    beforeEach(() => {
        Alpine = {
            magic: vi.fn(),
            data: vi.fn((name, callback) => {
                Alpine.components = Alpine.components || {}
                Alpine.components[name] = callback
            }),
            evaluate: vi.fn()
        }
        
        // Mock window events
        window.dispatchEvent = vi.fn()
    })

    const createInstance = (name, initialShow = false, autofocus = false, config = {}) => {
        modal(Alpine)
        const instance = Alpine.components['modal'](name, initialShow, autofocus, config)
        instance.$el = { querySelectorAll: vi.fn(() => []) }
        instance.$watch = vi.fn((key, cb) => {
            instance._watches = instance._watches || {}
            instance._watches[key] = cb
        })
        return instance
    }

    it('registers magic helpers', () => {
        modal(Alpine)
        expect(Alpine.magic).toHaveBeenCalledWith('openModal', expect.any(Function))
        expect(Alpine.magic).toHaveBeenCalledWith('closeModal', expect.any(Function))
    })

    it('registers modal data', () => {
        modal(Alpine)
        expect(Alpine.data).toHaveBeenCalledWith('modal', expect.any(Function))
    })
    
    it('magic openModal dispatches event', () => {
        modal(Alpine)
        const magicCallback = Alpine.magic.mock.calls.find(call => call[0] === 'openModal')[1]
        const openModal = magicCallback()
        
        openModal('test-modal')
        expect(window.dispatchEvent).toHaveBeenCalledWith(expect.any(CustomEvent))
        const event = window.dispatchEvent.mock.calls[0][0]
        expect(event.type).toBe('open-modal')
        expect(event.detail).toBe('test-modal')
    })

    it('triggers callbacks when show state changes', () => {
        const onOpen = vi.fn()
        const onClose = vi.fn()
        const instance = createInstance('test', false, false, { onOpen, onClose })
        instance.init()

        // Open
        instance.show = true
        instance._watches['show'](true)
        expect(onOpen).toHaveBeenCalled()

        // Close
        instance.show = false
        instance._watches['show'](false)
        expect(onClose).toHaveBeenCalled()
    })

    it('evaluates string callbacks', () => {
        const instance = createInstance('test', false, false, { onOpen: 'alert("opened")' })
        instance.init()

        instance.show = true
        instance._watches['show'](true)
        expect(Alpine.evaluate).toHaveBeenCalledWith(instance.$el, 'alert("opened")')
    })
})
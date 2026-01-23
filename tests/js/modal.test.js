import { describe, it, expect, vi, beforeEach, afterEach } from 'vitest'
import modal from '../../resources/js/alpine/modal.js'

describe('Modal Plugin', () => {
    let Alpine

    beforeEach(() => {
        Alpine = {
            magic: vi.fn(),
            data: vi.fn((name, callback) => {
                Alpine.components = Alpine.components || {}
                Alpine.components[name] = callback
            })
        }
        
        // Mock window events
        window.dispatchEvent = vi.fn()
    })

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
        // Extract the callback passed to magic
        const magicCallback = Alpine.magic.mock.calls.find(call => call[0] === 'openModal')[1]
        const openModal = magicCallback()
        
        openModal('test-modal')
        expect(window.dispatchEvent).toHaveBeenCalledWith(expect.any(CustomEvent))
        const event = window.dispatchEvent.mock.calls[0][0]
        expect(event.type).toBe('open-modal')
        expect(event.detail).toBe('test-modal')
    })
})

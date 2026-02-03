import { describe, it, expect, vi, beforeEach } from 'vitest'
import drawer from '../../resources/js/alpine/drawer.js'

describe('Drawer Plugin', () => {
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
        vi.stubGlobal('dispatchEvent', vi.fn())
    })

    const createInstance = (name, initialShow = false, config = {}) => {
        drawer(Alpine)
        const instance = Alpine.components['drawer'](name, initialShow, config)
        instance.$el = { querySelectorAll: vi.fn(() => []), tagName: 'DIV' }
        instance.$dispatch = vi.fn()
        instance.$watch = vi.fn((key, cb) => {
            instance._watches = instance._watches || {}
            instance._watches[key] = cb
        })
        return instance
    }

    it('registers magic helpers', () => {
        drawer(Alpine)
        expect(Alpine.magic).toHaveBeenCalledWith('openDrawer', expect.any(Function))
        expect(Alpine.magic).toHaveBeenCalledWith('closeDrawer', expect.any(Function))
    })

    it('registers drawer data', () => {
        drawer(Alpine)
        expect(Alpine.data).toHaveBeenCalledWith('drawer', expect.any(Function))
    })

    it('magic helpers dispatch events', () => {
        drawer(Alpine)
        const openDrawer = Alpine.magic.mock.calls.find(c => c[0] === 'openDrawer')[1]()
        openDrawer('my-drawer')
        expect(window.dispatchEvent).toHaveBeenCalledWith(expect.any(CustomEvent))
        const event = window.dispatchEvent.mock.calls[0][0]
        expect(event.type).toBe('open-drawer')
        expect(event.detail).toBe('my-drawer')
    })

    it('triggers callbacks when show state changes', () => {
        const onOpen = vi.fn()
        const onClose = vi.fn()
        const instance = createInstance('test', false, { onOpen, onClose })
        instance.init()

        // Open
        instance.show = true
        instance._watches['show'](true)
        expect(onOpen).toHaveBeenCalledWith({})

        // Close
        instance.show = false
        instance._watches['show'](false)
        expect(onClose).toHaveBeenCalledWith({})
    })

    it('evaluates string callbacks', () => {
        vi.stubGlobal('Alpine', Alpine)
        const instance = createInstance('test', false, { onOpen: 'console.log("opened")' })
        instance.init()

        instance.show = true
        instance._watches['show'](true)
        expect(Alpine.evaluate).toHaveBeenCalledWith(instance.$el, 'console.log("opened")', expect.any(Object))
    })
})
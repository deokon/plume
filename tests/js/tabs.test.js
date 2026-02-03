import { describe, it, expect, vi, beforeEach } from 'vitest'
import tabs from '../../resources/js/alpine/tabs.js'

describe('Tabs Plugin', () => {
    let instance

    beforeEach(() => {
        vi.stubGlobal('Alpine', {
            evaluate: vi.fn()
        })
    })

    const createInstance = (defaultTab = '1', model = null, config = {}) => {
        const data = tabs(defaultTab, model, config)
        data.$el = { tagName: 'DIV' }
        data.$dispatch = vi.fn()
        data.$watch = vi.fn((key, cb) => {
            data._watches = data._watches || {}
            data._watches[key] = cb
        })
        data.$nextTick = vi.fn((cb) => cb())
        return data
    }

    it('initializes with default tab', () => {
        instance = createInstance('2')
        expect(instance.activeTab).toBe('2')
    })

    it('triggers onTabChange callback when activeTab changes', () => {
        const onTabChange = vi.fn()
        instance = createInstance('1', null, { onTabChange })
        instance.init()

        instance.activeTab = '2'
        instance._watches['activeTab']('2')
        
        expect(onTabChange).toHaveBeenCalledWith({ value: '2' })
    })

    it('evaluates string expression for onTabChange', () => {
        instance = createInstance('1', null, { onTabChange: 'alert(value)' })
        instance.init()

        instance.activeTab = '3'
        instance._watches['activeTab']('3')
        
        expect(window.Alpine.evaluate).toHaveBeenCalledWith(instance.$el, 'alert(value)', {
            scope: expect.objectContaining({ value: '3' })
        })
    })
})

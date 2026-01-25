import { describe, it, expect, vi, beforeEach } from 'vitest'
import search from '../../resources/js/alpine/search.js'

describe('Search Plugin', () => {
    let instance

    beforeEach(() => {
        vi.stubGlobal('Alpine', {
            evaluate: vi.fn()
        })
    })

    const createInstance = (config = {}) => {
        const data = search(config)
        data.$el = { tagName: 'DIV' }
        return data
    }

    it('initializes with default state', () => {
        instance = createInstance()
        expect(instance.open).toBe(false)
        expect(instance.query).toBe('')
    })

    it('triggers onSelect callback', () => {
        const onSelect = vi.fn()
        instance = createInstance({ onSelect })
        const payload = { id: 1, name: 'Result' }
        
        instance.handleSelect(payload)
        expect(onSelect).toHaveBeenCalledWith(payload)
    })

    it('evaluates string expression for onSelect', () => {
        instance = createInstance({ onSelect: 'console.log(result.id)' })
        const payload = { id: 5 }
        
        instance.handleSelect(payload)
        expect(window.Alpine.evaluate).toHaveBeenCalledWith(instance.$el, 'console.log(result.id)', {
            scope: { result: payload }
        })
    })
})

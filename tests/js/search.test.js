import { describe, it, expect, vi, beforeEach } from 'vitest'
import search from '../../resources/js/alpine/search.js'

describe('Search Plugin', () => {
    let instance

    beforeEach(() => {
        vi.stubGlobal('Alpine', {
            evaluate: vi.fn()
        })
    })

    const createInstance = (model = null, config = {}) => {
        const data = search(model, config)
        data.$el = { tagName: 'DIV' }
        data.$dispatch = vi.fn()
        return data
    }

    it('initializes with default state', () => {
        instance = createInstance()
        expect(instance.open).toBe(false)
        expect(instance.query).toBe('')
    })

    it('triggers onSelect callback', () => {
        const onSelect = vi.fn()
        instance = createInstance(null, { onSelect })
        const payload = { id: 1, name: 'Result' }
        
        instance.handleSelect(payload)
        expect(onSelect).toHaveBeenCalledWith({ result: payload })
    })

    it('evaluates string expression for onSelect', () => {
        instance = createInstance(null, { onSelect: 'console.log(result.id)' })
        const payload = { id: 5 }
        
        instance.handleSelect(payload)
        expect(window.Alpine.evaluate).toHaveBeenCalledWith(instance.$el, 'console.log(result.id)', {
            scope: expect.objectContaining({ result: payload })
        })
    })
})

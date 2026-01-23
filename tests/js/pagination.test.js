import { describe, it, expect, vi, beforeEach } from 'vitest'
import pagination from '../../resources/js/alpine/pagination.js'

describe('Pagination Plugin', () => {
    let instance

    beforeEach(() => {
        const MockObserver = function() {
            this.observe = vi.fn();
            this.disconnect = vi.fn();
        };
        vi.stubGlobal('MutationObserver', MockObserver);
    })

    const createInstance = (total = 1, current = 1, onEachSide = 1) => {
        const data = pagination(total, current, onEachSide)
        data.$el = {
            getAttribute: vi.fn(() => null)
        }
        data.$watch = vi.fn()
        data.$dispatch = vi.fn()
        data.$nextTick = vi.fn(cb => cb())
        return data
    }

    it('initializes with values', () => {
        instance = createInstance(10, 2, 2)
        expect(instance.total).toBe(10)
        expect(instance.current).toBe(2)
        expect(instance.onEachSide).toBe(2)
    })

    it('generates simple page range for small totals', () => {
        instance = createInstance(5, 1)
        expect(instance.pages).toEqual([1, 2, 3, 4, 5])
    })

    it('generates complex page range with ellipsis', () => {
        // total 20, current 10, side 1 => [1, '...', 9, 10, 11, '...', 20]
        instance = createInstance(20, 10, 1)
        expect(instance.pages).toEqual([1, '...', 9, 10, 11, '...', 20])

        // total 20, current 2, side 1 => [1, 2, 3, '...', 20]
        instance = createInstance(20, 2, 1)
        expect(instance.pages).toEqual([1, 2, 3, '...', 20])

        // total 20, current 19, side 1 => [1, '...', 18, 19, 20]
        instance = createInstance(20, 19, 1)
        expect(instance.pages).toEqual([1, '...', 18, 19, 20])
    })

    it('dispatches page-change event', () => {
        instance = createInstance(10, 1)
        instance.dispatch(5)
        expect(instance.$dispatch).toHaveBeenCalledWith('plume-page-change', { page: 5 })
    })

    it('does not dispatch on ellipsis click', () => {
        instance = createInstance(10, 1)
        instance.dispatch('...')
        expect(instance.$dispatch).not.toHaveBeenCalled()
    })
})

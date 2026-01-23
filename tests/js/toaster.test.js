import { describe, it, expect, vi, beforeEach } from 'vitest'
import toaster from '../../resources/js/alpine/toaster.js'

describe('Toaster Plugin', () => {
    let Alpine

    beforeEach(() => {
        Alpine = {
            magic: vi.fn(),
            store: vi.fn((name, obj) => {
                if (obj) {
                    Alpine.stores[name] = obj
                }
                return Alpine.stores[name]
            }),
            stores: {}
        }
    })

    it('registers magic helpers', () => {
        toaster(Alpine)
        expect(Alpine.magic).toHaveBeenCalledWith('toast', expect.any(Function))
        expect(Alpine.magic).toHaveBeenCalledWith('success', expect.any(Function))
        expect(Alpine.magic).toHaveBeenCalledWith('error', expect.any(Function))
    })

    it('can add a toast to the store', () => {
        toaster(Alpine)
        const store = Alpine.store('toasts')
        
        store.add({ message: 'test' })
        
        expect(store.items).toHaveLength(1)
        expect(store.items[0].message).toBe('test')
    })

    it('can remove a toast', () => {
        toaster(Alpine)
        const store = Alpine.store('toasts')
        
        store.add({ message: 'test' })
        const id = store.items[0].id
        
        store.remove(id)
        expect(store.items).toHaveLength(0)
    })
    
    it('autocloses toasts', async () => {
        vi.useFakeTimers()
        toaster(Alpine)
        const store = Alpine.store('toasts')
        
        store.add({ message: 'test', duration: 1000 })
        expect(store.items).toHaveLength(1)
        
        vi.advanceTimersByTime(1000)
        expect(store.items).toHaveLength(0)
        vi.useRealTimers()
    })
})

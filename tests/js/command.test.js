import { describe, it, expect, vi, beforeEach } from 'vitest'
import command from '../../resources/js/alpine/command.js'

describe('Command Plugin', () => {
    let instance
    let mockItems

    const createInstance = () => {
        mockItems = [
            { textContent: 'Option 1', click: vi.fn(), hasAttribute: () => false },
            { textContent: 'Apple', click: vi.fn(), hasAttribute: () => false },
            { textContent: 'Banana', click: vi.fn(), hasAttribute: () => false }
        ]
        const data = command()
        data.$nextTick = vi.fn(cb => cb())
        data.$el = {
            querySelectorAll: vi.fn(() => [])
        }
        data.$refs = {
            items: {
                querySelectorAll: vi.fn(() => mockItems)
            },
            input: { focus: vi.fn() }
        }
        return data
    }

    it('toggles open state and focuses input', () => {
        instance = createInstance()
        const mockLastFocused = { focus: vi.fn() }
        // Mock document.activeElement
        Object.defineProperty(document, 'activeElement', { value: mockLastFocused, configurable: true })

        instance.toggle()
        expect(instance.open).toBe(true)
        expect(instance.$refs.input.focus).toHaveBeenCalled()
        expect(instance.lastFocusedElement).toBe(mockLastFocused)

        instance.toggle()
        expect(instance.open).toBe(false)
        expect(mockLastFocused.focus).toHaveBeenCalled()
    })

    it('filters items based on search', () => {
        instance = createInstance()
        instance.search = 'apple'
        expect(instance.filteredItems).toHaveLength(1)
        expect(instance.filteredItems[0].textContent).toBe('Apple')
    })

    it('navigates with ArrowDown and ArrowUp', () => {
        instance = createInstance()
        instance.activeIndex = 0
        
        instance.onKeydown({ key: 'ArrowDown', preventDefault: vi.fn() })
        expect(instance.activeIndex).toBe(1)
        
        instance.onKeydown({ key: 'ArrowDown', preventDefault: vi.fn() })
        expect(instance.activeIndex).toBe(2)
        
        instance.onKeydown({ key: 'ArrowUp', preventDefault: vi.fn() })
        expect(instance.activeIndex).toBe(1)
    })

    it('clicks active item on Enter', () => {
        instance = createInstance()
        instance.activeIndex = 1
        // The second item is 'Apple'
        
        instance.onKeydown({ key: 'Enter', preventDefault: vi.fn() })
        expect(mockItems[1].click).toHaveBeenCalled()
    })
})

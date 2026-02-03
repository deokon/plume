import { describe, it, expect, vi, beforeEach } from 'vitest'
import combobox from '../../resources/js/alpine/combobox.js'

describe('Combobox Plugin', () => {
    let instance
    const options = [
        { value: 1, label: 'Option 1' },
        { value: 2, label: 'Option 2' },
        { value: 3, label: 'Apple' }
    ]

    beforeEach(() => {
        vi.stubGlobal('Alpine', {
            evaluate: vi.fn()
        })
    })

    const createInstance = (opts = options, model = null, config = {}) => {
        const data = combobox(opts, model, config)
        data.$nextTick = vi.fn(cb => cb())
        data.$watch = vi.fn((key, cb) => {
            data._watches = data._watches || {}
            data._watches[key] = cb
        })
        data.$dispatch = vi.fn()
        data.$data = {}
        data.$el = { tagName: 'DIV' }
        data.$refs = {
            searchInput: { focus: vi.fn() },
            list: { children: [{ scrollIntoView: vi.fn() }, { scrollIntoView: vi.fn() }, { scrollIntoView: vi.fn() }] }
        }
        return data
    }

    it('initializes with options', () => {
        instance = createInstance()
        instance.init()
        expect(instance.filteredOptions).toEqual(options)
        expect(instance.activeIndex).toBe(-1)
    })

    it('filters options based on search', () => {
        instance = createInstance()
        instance.init()
        instance.search = 'app'
        // Trigger manual watch for test
        instance._watches['search']()
        
        expect(instance.filteredOptions).toHaveLength(1)
        expect(instance.filteredOptions[0].label).toBe('Apple')
        expect(instance.open).toBe(true)
    })

    it('selects an option', () => {
        instance = createInstance()
        instance.init()
        instance.select(options[0])
        
        expect(instance.value).toBe(1)
        expect(instance.search).toBe('')
        expect(instance.open).toBe(false)
        expect(instance.selectedLabel).toBe('Option 1')
    })

    it('toggles open state and focuses input', () => {
        instance = createInstance()
        instance.init()
        instance.toggle()
        expect(instance.open).toBe(true)
        expect(instance.$refs.searchInput.focus).toHaveBeenCalled()
        
        instance.toggle()
        expect(instance.open).toBe(false)
    })

    it('triggers onSelect callback', () => {
        const onSelect = vi.fn()
        instance = createInstance(options, null, { onSelect })
        instance.init()

        instance.select(options[1])
        expect(onSelect).toHaveBeenCalledWith({ value: 2 })
    })

    it('evaluates string expression for onSelect', () => {
        instance = createInstance(options, null, { onSelect: 'console.log(value)' })
        instance.init()

        instance.select(options[2])
        expect(window.Alpine.evaluate).toHaveBeenCalledWith(instance.$el, 'console.log(value)', {
            scope: expect.objectContaining({ value: 3 })
        })
    })

    describe('keyboard navigation', () => {
        it('navigates with ArrowDown and ArrowUp', () => {
            instance = createInstance()
            instance.init()
            instance.open = true
            
            instance.onKeydown({ key: 'ArrowDown', preventDefault: vi.fn() })
            expect(instance.activeIndex).toBe(0)
            
            instance.onKeydown({ key: 'ArrowDown', preventDefault: vi.fn() })
            expect(instance.activeIndex).toBe(1)
            
            instance.onKeydown({ key: 'ArrowUp', preventDefault: vi.fn() })
            expect(instance.activeIndex).toBe(0)
        })

        it('selects active option with Enter', () => {
            instance = createInstance()
            instance.init()
            instance.open = true
            instance.activeIndex = 2
            
            instance.onKeydown({ key: 'Enter', preventDefault: vi.fn() })
            expect(instance.value).toBe(3)
            expect(instance.open).toBe(false)
        })

        it('closes on Escape or Tab', () => {
            instance = createInstance()
            instance.init()
            instance.open = true
            
            instance.onKeydown({ key: 'Escape' })
            expect(instance.open).toBe(false)
            
            instance.open = true
            instance.onKeydown({ key: 'Tab' })
            expect(instance.open).toBe(false)
        })
    })
})
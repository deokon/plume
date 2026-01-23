import { describe, it, expect } from 'vitest'
import { accordion, accordionItem } from '../../resources/js/alpine/accordion.js'

describe('Accordion Plugin', () => {
    describe('accordion function', () => {
        it('initializes with default state', () => {
            const data = accordion(false)
            expect(data.active).toBeNull()
            expect(data.alwaysOpen).toBe(false)
        })

        it('selects an item and toggles it', () => {
            const data = accordion(false)
            data.select('item1')
            expect(data.active).toBe('item1')
            data.select('item1')
            expect(data.active).toBeNull()
        })

        it('switches between items', () => {
            const data = accordion(false)
            data.select('item1')
            data.select('item2')
            expect(data.active).toBe('item2')
        })

        it('does nothing when alwaysOpen is true', () => {
            const data = accordion(true)
            data.select('item1')
            expect(data.active).toBeNull()
        })
    })

    describe('accordionItem function', () => {
        const createMergedItem = (id, open, alwaysOpen = false) => {
            const parent = accordion(alwaysOpen)
            const item = accordionItem(id, open)
            const merged = { ...parent, ...item }
            
            // Manually define the getter and setter on the merged object
            // because spread operator doesn't copy them properly
            const descriptor = Object.getOwnPropertyDescriptor(item, 'isOpen')
            Object.defineProperty(merged, 'isOpen', descriptor)
            
            return merged
        }

        it('initializes with default state', () => {
            const item = accordionItem('test-id', false)
            expect(item.id).toBe('test-id')
            expect(item.localOpen).toBe(false)
        })

        it('isOpen returns localOpen when alwaysOpen is true', () => {
            const item = createMergedItem('test-id', true, true)
            expect(item.isOpen).toBe(true)
            item.localOpen = false
            expect(item.isOpen).toBe(false)
        })

        it('isOpen returns true if active matches id when alwaysOpen is false', () => {
            const item = createMergedItem('test-id', false, false)
            expect(item.isOpen).toBe(false)
            item.active = 'test-id'
            expect(item.isOpen).toBe(true)
        })

        it('setting isOpen calls select when alwaysOpen is false', () => {
            const item = createMergedItem('test-id', false, false)
            item.isOpen = true
            expect(item.active).toBe('test-id')
            item.isOpen = false
            expect(item.active).toBeNull()
        })

        it('setting isOpen updates localOpen when alwaysOpen is true', () => {
            const item = createMergedItem('test-id', false, true)
            item.isOpen = true
            expect(item.localOpen).toBe(true)
            expect(item.active).toBeNull()
        })
    })
})

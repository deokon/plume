import { describe, it, expect, vi, beforeEach } from 'vitest'
import pagePlugin from '../../resources/js/alpine/page.js'

describe('Page Plugin', () => {
    let Alpine
    let instance

    beforeEach(() => {
        Alpine = {
            data: vi.fn((name, callback) => {
                Alpine.components = Alpine.components || {}
                Alpine.components[name] = callback
            })
        }
        
        // Mock localStorage
        const storage = {}
        vi.stubGlobal('localStorage', {
            getItem: vi.fn(key => storage[key]),
            setItem: vi.fn((key, val) => storage[key] = val),
            removeItem: vi.fn(key => delete storage[key]),
            theme: undefined
        })

        // Mock matchMedia
        vi.stubGlobal('matchMedia', vi.fn(() => ({ matches: false })))

        // Mock documentElement.classList
        vi.stubGlobal('document', {
            documentElement: {
                classList: {
                    contains: vi.fn(() => false),
                    add: vi.fn(),
                    remove: vi.fn(),
                    toggle: vi.fn()
                }
            }
        })
    })

    const createInstance = () => {
        pagePlugin(Alpine)
        const data = Alpine.components['page']()
        return data
    }

    it('initializes from localStorage', () => {
        localStorage.theme = 'dark'
        instance = createInstance()
        instance.init()
        expect(instance.darkMode).toBe(true)
        expect(document.documentElement.classList.toggle).toHaveBeenCalledWith('dark', true)
    })

    it('initializes from matchMedia if no theme in localStorage', () => {
        delete localStorage.theme
        window.matchMedia.mockReturnValue({ matches: true })
        
        instance = createInstance()
        instance.init()
        expect(instance.darkMode).toBe(true)
    })

    it('toggles color mode', () => {
        instance = createInstance()
        instance.darkMode = false
        
        instance.toggleColorMode()
        expect(instance.darkMode).toBe(true)
        expect(document.documentElement.classList.add).toHaveBeenCalledWith('dark')
        expect(localStorage.theme).toBe('dark')

        instance.toggleColorMode()
        expect(instance.darkMode).toBe(false)
        expect(document.documentElement.classList.remove).toHaveBeenCalledWith('dark')
        expect(localStorage.theme).toBe('light')
    })

    it('sets color mode explicitly', () => {
        instance = createInstance()
        instance.setColorMode('dark')
        expect(document.documentElement.classList.add).toHaveBeenCalledWith('dark')
        expect(localStorage.theme).toBe('dark')

        instance.setColorMode('light')
        expect(document.documentElement.classList.remove).toHaveBeenCalledWith('dark')
        expect(localStorage.theme).toBe('light')
    })
})

import { describe, it, expect, vi, beforeEach, afterEach } from 'vitest'
import carousel from '../../resources/js/alpine/carousel.js'

describe('Carousel Plugin', () => {
    let instance

    beforeEach(() => {
        vi.useFakeTimers()
    })

    afterEach(() => {
        vi.restoreAllMocks()
        vi.useRealTimers()
    })

    const createInstance = (autoplay = false, interval = 3000) => {
        const data = carousel(autoplay, interval)
        data.$nextTick = vi.fn(cb => cb())
        data.$dispatch = vi.fn()
        data.$el = {
            addEventListener: vi.fn(),
            removeEventListener: vi.fn()
        }
        data.$refs = {
            content: {
                children: [{}, {}, {}],
                scrollLeft: 0,
                offsetWidth: 100,
                scrollTo: vi.fn()
            }
        }
        return data
    }

    it('initializes with correct slide count', () => {
        instance = createInstance()
        instance.init()
        expect(instance.slideCount).toBe(3)
        expect(instance.activeSlide).toBe(0)
    })

    it('scrolls to next slide', () => {
        instance = createInstance()
        instance.init()
        instance.next()
        expect(instance.$refs.content.scrollTo).toHaveBeenCalledWith({ left: 100, behavior: 'smooth' })
    })

    it('loops back to first slide when at the end', () => {
        instance = createInstance()
        instance.init()
        instance.activeSlide = 2
        instance.next()
        expect(instance.$refs.content.scrollTo).toHaveBeenCalledWith({ left: 0, behavior: 'smooth' })
    })

    it('scrolls to previous slide', () => {
        instance = createInstance()
        instance.init()
        instance.activeSlide = 1
        instance.prev()
        expect(instance.$refs.content.scrollTo).toHaveBeenCalledWith({ left: 0, behavior: 'smooth' })
    })

    it('loops to last slide when at the beginning', () => {
        instance = createInstance()
        instance.init()
        instance.activeSlide = 0
        instance.prev()
        expect(instance.$refs.content.scrollTo).toHaveBeenCalledWith({ left: 200, behavior: 'smooth' })
    })

    it('starts autoplay if enabled', () => {
        instance = createInstance(true, 5000)
        instance.init()
        expect(instance.autoplayInterval).not.toBeNull()
        
        vi.advanceTimersByTime(5000)
        expect(instance.$refs.content.scrollTo).toHaveBeenCalledWith({ left: 100, behavior: 'smooth' })
    })

    it('stops autoplay on mouseenter and restarts on mouseleave', () => {
        instance = createInstance(true, 3000)
        instance.init()
        
        const mouseEnterHandler = instance.$el.addEventListener.mock.calls.find(call => call[0] === 'mouseenter')[1]
        const mouseLeaveHandler = instance.$el.addEventListener.mock.calls.find(call => call[0] === 'mouseleave')[1]

        mouseEnterHandler()
        vi.advanceTimersByTime(3000)
        expect(instance.$refs.content.scrollTo).not.toHaveBeenCalled()

        mouseLeaveHandler()
        vi.advanceTimersByTime(3000)
        expect(instance.$refs.content.scrollTo).toHaveBeenCalled()
    })
})

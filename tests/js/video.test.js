import { describe, it, expect, vi, beforeEach } from 'vitest'
import video from '../../resources/js/alpine/video.js'

describe('Video Plugin', () => {
    let instance

    beforeEach(() => {
        vi.stubGlobal('Alpine', {
            evaluate: vi.fn()
        })
    })

    const createInstance = (autoplay = false, config = {}) => {
        const data = video(autoplay, config)
        data.$refs = {
            video: {
                play: vi.fn(),
                pause: vi.fn()
            }
        }
        data.$el = { tagName: 'DIV' }
        return data
    }

    it('initializes with autoplay state', () => {
        let instance = createInstance(true)
        expect(instance.playing).toBe(true)
        
        instance = createInstance(false)
        expect(instance.playing).toBe(false)
    })

    it('toggles playing state', () => {
        const instance = createInstance(false)
        
        instance.toggle()
        expect(instance.playing).toBe(true)
        expect(instance.$refs.video.play).toHaveBeenCalled()

        instance.toggle()
        expect(instance.playing).toBe(false)
        expect(instance.$refs.video.pause).toHaveBeenCalled()
    })

    it('triggers callbacks', () => {
        const onPlay = vi.fn()
        const onPause = vi.fn()
        const onEnded = vi.fn()
        instance = createInstance(false, { onPlay, onPause, onEnded })

        instance.triggerCallback('onPlay')
        expect(onPlay).toHaveBeenCalled()

        instance.triggerCallback('onPause')
        expect(onPause).toHaveBeenCalled()

        instance.triggerCallback('onEnded')
        expect(onEnded).toHaveBeenCalled()
    })

    it('evaluates string expressions for callbacks', () => {
        instance = createInstance(false, { onPlay: 'console.log("playing")' })
        
        instance.triggerCallback('onPlay')
        expect(window.Alpine.evaluate).toHaveBeenCalledWith(instance.$el, 'console.log("playing")')
    })
})
import { describe, it, expect, vi } from 'vitest'
import video from '../../resources/js/alpine/video.js'

describe('Video Plugin', () => {
    const createInstance = (autoplay = false) => {
        const data = video(autoplay)
        data.$refs = {
            video: {
                play: vi.fn(),
                pause: vi.fn()
            }
        }
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
})

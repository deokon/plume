import { describe, it, expect, vi, beforeEach } from 'vitest'
import stepper from '../../resources/js/alpine/stepper.js'

describe('Stepper Plugin', () => {
    let instance

    beforeEach(() => {
        vi.stubGlobal('Alpine', {
            evaluate: vi.fn()
        })
    })

    const createInstance = (initialStep = 1, config = {}) => {
        const data = stepper(initialStep, config)
        data.$el = { tagName: 'DIV' }
        data.$watch = vi.fn((key, cb) => {
            data._watches = data._watches || {}
            data._watches[key] = cb
        })
        return data
    }

    it('initializes with default step', () => {
        instance = createInstance(2)
        expect(instance.active).toBe(2)
    })

    it('triggers onStepChange callback when active changes', () => {
        const onStepChange = vi.fn()
        instance = createInstance(1, { onStepChange })
        instance.init()

        instance.active = 2
        instance._watches['active'](2)
        
        expect(onStepChange).toHaveBeenCalledWith(2)
    })

    it('triggers onFinish callback', () => {
        const onFinish = vi.fn()
        instance = createInstance(3, { onFinish })
        instance.init()

        instance.finish()
        expect(onFinish).toHaveBeenCalledWith(3)
    })

    it('evaluates string expressions for callbacks', () => {
        instance = createInstance(1, { onStepChange: 'console.log(step)' })
        instance.init()

        instance.active = 4
        instance._watches['active'](4)
        
        expect(window.Alpine.evaluate).toHaveBeenCalledWith(instance.$el, 'console.log(step)', {
            scope: { step: 4 }
        })
    })
})

import { describe, it, expect, vi, beforeEach } from 'vitest'
import calendar from '../../resources/js/alpine/calendar.js'

describe('Calendar Plugin', () => {
    let instance
    
    beforeEach(() => {
        vi.stubGlobal('Alpine', {
            evaluate: vi.fn()
        })
    })

    const createInstance = (initialValue = null, mode = 'single', minDate = null, maxDate = null, modelName = null, config = {}) => {
        const data = calendar(initialValue, mode, minDate, maxDate, modelName, config)
        data.$nextTick = vi.fn(cb => cb())
        data.$watch = vi.fn()
        data.$dispatch = vi.fn()
        data.$el = { tagName: 'DIV' }
        data.$data = {}
        return data
    }

    it('initializes in single mode', () => {
        instance = createInstance('2023-01-01', 'single')
        instance.init()
        expect(instance.selectedDate.getFullYear()).toBe(2023)
        expect(instance.selectedDate.getMonth()).toBe(0)
        expect(instance.selectedDate.getDate()).toBe(1)
    })

    it('initializes in range mode', () => {
        instance = createInstance(['2023-01-01', '2023-01-05'], 'range')
        instance.init()
        expect(instance.rangeStart.getFullYear()).toBe(2023)
        expect(instance.rangeEnd.getDate()).toBe(5)
    })

    it('parses date strings correctly', () => {
        instance = createInstance()
        const date = instance.parseDate('2023-12-25')
        expect(date.getFullYear()).toBe(2023)
        expect(date.getMonth()).toBe(11)
        expect(date.getDate()).toBe(25)
    })

    it('formats dates correctly', () => {
        instance = createInstance()
        const date = new Date(2023, 0, 1) // Jan 1st
        expect(instance.formatDate(date)).toBe('2023-01-01')
    })

    it('navigates months', () => {
        instance = createInstance('2023-01-01')
        instance.init()
        instance.nextMonth()
        expect(instance.month).toBe(1)
        instance.prevMonth()
        expect(instance.month).toBe(0)
    })

    it('selects date in single mode', () => {
        instance = createInstance(null, 'single')
        instance.init()
        const testDate = new Date(2023, 5, 15)
        instance.selectDate({ day: 15, disabled: false, date: testDate })
        
        expect(instance.value).toBe('2023-06-15')
        expect(instance.$dispatch).toHaveBeenCalledWith('change', '2023-06-15')
    })

    it('selects range in range mode', () => {
        instance = createInstance(null, 'range')
        instance.init()
        
        const date1 = new Date(2023, 0, 1)
        const date2 = new Date(2023, 0, 10)
        
        instance.selectDate({ day: 1, disabled: false, date: date1 })
        expect(instance.value).toEqual(['2023-01-01', null])
        
        instance.selectDate({ day: 10, disabled: false, date: date2 })
        expect(instance.value).toEqual(['2023-01-01', '2023-01-10'])
    })

    it('respects min and max dates', () => {
        const min = '2023-01-10'
        const max = '2023-01-20'
        instance = createInstance(null, 'single', min, max)
        instance.init()
        instance.currDate = new Date(2023, 0, 1) // Force January 2023
        
        const days = instance.calendarDays
        const earlyDay = days.find(d => d.day === 5)
        const lateDay = days.find(d => d.day === 25)
        const validDay = days.find(d => d.day === 15)

        if (earlyDay) expect(earlyDay.disabled).toBe(true)
        if (lateDay) expect(lateDay.disabled).toBe(true)
        if (validDay) expect(validDay.disabled).toBe(false)
    })

    it('triggers onDateSelect callback', () => {
        const onDateSelect = vi.fn()
        instance = createInstance(null, 'single', null, null, null, { onDateSelect })
        instance.init()

        const testDate = new Date(2023, 5, 15)
        instance.selectDate({ day: 15, disabled: false, date: testDate })
        expect(onDateSelect).toHaveBeenCalledWith('2023-06-15')
    })

    it('evaluates string expression for onDateSelect', () => {
        instance = createInstance(null, 'single', null, null, null, { onDateSelect: 'console.log(value)' })
        instance.init()

        const testDate = new Date(2023, 5, 15)
        instance.selectDate({ day: 15, disabled: false, date: testDate })
        expect(window.Alpine.evaluate).toHaveBeenCalledWith(instance.$el, 'console.log(value)', {
            scope: { value: '2023-06-15' }
        })
    })
})
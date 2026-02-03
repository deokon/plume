import { describe, it, expect, vi, beforeEach } from 'vitest'
import dataTable from '../../resources/js/alpine/data-table.js'

describe('DataTable Plugin', () => {
    let instance
    const testData = [
        { id: 1, name: 'John Doe', age: 30 },
        { id: 2, name: 'Jane Smith', age: 25 },
        { id: 3, name: 'Bob Johnson', age: 40 }
    ]

    beforeEach(() => {
        const MockObserver = function() {
            this.observe = vi.fn();
            this.disconnect = vi.fn();
        };
        vi.stubGlobal('MutationObserver', MockObserver);
    })

    const createInstance = (perPage = 10, paginated = false, sortable = true, url = null, initialData = testData, slots = {}) => {
        const data = dataTable(perPage, paginated, sortable, url, initialData, [], slots)
        data.$el = {
            getAttribute: vi.fn((attr) => {
                if (attr === 'data') return JSON.stringify(initialData)
                return null
            })
        }
        data.$watch = vi.fn()
        data.$dispatch = vi.fn()
        return data
    }

    it('initializes with data', () => {
        instance = createInstance()
        instance.init()
        expect(instance.data).toEqual(testData)
        expect(instance.totalItems).toBe(3)
    })

    it('filters data by search query', () => {
        instance = createInstance()
        instance.init()
        instance.search = 'jane'
        expect(instance.filteredData).toHaveLength(1)
        expect(instance.filteredData[0].name).toBe('Jane Smith')
    })

    it('sorts data', () => {
        instance = createInstance()
        instance.init()
        
        instance.toggleSort('age')
        expect(instance.sortCol).toBe('age')
        expect(instance.sortDir).toBe('asc')
        expect(instance.filteredData[0].age).toBe(25)

        instance.toggleSort('age')
        expect(instance.sortDir).toBe('desc')
        expect(instance.filteredData[0].age).toBe(40)
    })

    it('paginates data', () => {
        instance = createInstance(2, true)
        instance.init()
        expect(instance.totalPages).toBe(2)
        expect(instance.pagedData).toHaveLength(2)
        
        instance.page = 2
        expect(instance.pagedData).toHaveLength(1)
        expect(instance.pagedData[0].id).toBe(3)
    })

    it('fetches data from URL', async () => {
        const mockResponse = {
            success: true,
            data: {
                items: [{ id: 10, name: 'Server Item' }],
                pagination: { total: 100 }
            }
        }
        vi.stubGlobal('fetch', vi.fn(() => 
            Promise.resolve({
                ok: true,
                json: () => Promise.resolve(mockResponse)
            })
        ))

        instance = createInstance(10, true, true, '/api/data')
        await instance.fetch()
        
        expect(instance.data).toHaveLength(1)
        expect(instance.data[0].name).toBe('Server Item')
        expect(instance.total).toBe(100)
        expect(instance.loading).toBe(false)

        // Verify reactivity: pagedData should be a copy, not the same reference
        const data1 = instance.pagedData
        const data2 = instance.pagedData
        expect(data1).toEqual(data2)
        expect(data1).not.toBe(data2)
        expect(data1).not.toBe(instance.data)
    })

    it('ignores stale fetch responses', async () => {
        let resolve1, resolve2;
        const promise1 = new Promise(resolve => resolve1 = resolve);
        const promise2 = new Promise(resolve => resolve2 = resolve);

        vi.stubGlobal('fetch', vi.fn()
            .mockReturnValueOnce(promise1.then(() => ({ ok: true, json: () => Promise.resolve({ success: true, data: { items: [{ name: 'Stale' }], pagination: { total: 1 } } }) })))
            .mockReturnValueOnce(promise2.then(() => ({ ok: true, json: () => Promise.resolve({ success: true, data: { items: [{ name: 'Fresh' }], pagination: { total: 1 } } }) })))
        );

        instance = createInstance(10, true, true, '/api/data')
        
        const fetch1 = instance.fetch()
        const fetch2 = instance.fetch()

        expect(instance.loading).toBe(true)

        // Resolve second request first
        resolve2();
        await fetch2;
        expect(instance.data[0].name).toBe('Fresh')
        // Loading should still be true because fetch1 is still pending
        expect(instance.loading).toBe(true)

        // Resolve first request later
        resolve1();
        await fetch1;
        // Data should still be 'Fresh', not overwritten by 'Stale'
        expect(instance.data[0].name).toBe('Fresh')
        // Loading should now be false as all requests are finished
        expect(instance.loading).toBe(false)
    })

    it('renders constructed columns', () => {
        instance = createInstance()
        const row = { name: 'John', url: 'https://example.com', profile: { bio: 'Engineer' } }
        
        expect(instance.renderConstructed('<a href="{url}">{name}</a>', row))
            .toBe('<a href="https://example.com">John</a>')
        
        expect(instance.renderConstructed('Bio: {profile.bio}', row))
            .toBe('Bio: Engineer')
        
        expect(instance.renderConstructed('Unknown: {missing}', row))
            .toBe('Unknown: ')
    })

    it('renders constructed columns with slots', () => {
        const slots = {
            badge: '<span class="badge">{status}</span>',
            link: '<a href="/{id}">{name}</a>'
        }
        instance = createInstance(10, false, true, null, testData, slots)
        const row = { id: 1, name: 'John', status: 'active' }
        
        expect(instance.renderConstructed('{slot:badge}', row))
            .toBe('<span class="badge">active</span>')
        
        expect(instance.renderConstructed('{slot:link} - {status}', row))
            .toBe('<a href="/1">John</a> - active')
        
        expect(instance.renderConstructed('Missing {slot:none}', row))
            .toBe('Missing ')
    })
})
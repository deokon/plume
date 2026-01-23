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

    const createInstance = (perPage = 10, paginated = false, sortable = true, url = null, initialData = testData) => {
        const data = dataTable(perPage, paginated, sortable, url, initialData)
        data.$el = {
            getAttribute: vi.fn((attr) => {
                if (attr === 'data') return JSON.stringify(initialData)
                return null
            })
        }
        data.$watch = vi.fn()
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
                json: () => Promise.resolve(mockResponse)
            })
        ))

        instance = createInstance(10, true, true, '/api/data')
        await instance.fetch()
        
        expect(instance.data).toHaveLength(1)
        expect(instance.data[0].name).toBe('Server Item')
        expect(instance.total).toBe(100)
        expect(instance.loading).toBe(false)
    })
})

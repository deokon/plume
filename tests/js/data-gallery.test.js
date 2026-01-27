import { describe, it, expect, vi, beforeEach } from 'vitest'
import dataGallery from '../../resources/js/alpine/data-gallery.js'

describe('DataGallery Plugin', () => {
    let instance
    const testData = [
        { id: 1, name: 'Product 1', price: 29.99 },
        { id: 2, name: 'Product 2', price: 39.99 },
        { id: 3, name: 'Product 3', price: 49.99 },
    ]

    beforeEach(() => {
        const MockObserver = function () {
            this.observe = vi.fn();
            this.disconnect = vi.fn();
        };
        vi.stubGlobal('MutationObserver', MockObserver);
    })

    const createInstance = (perPage = 10, paginated = false, url = null, initialData = testData) => {
        const data = dataGallery(perPage, paginated, url, initialData)
        data.$el = {
            getAttribute: vi.fn((attr) => {
                if (attr === 'data') return JSON.stringify(initialData)
                return null
            }),
            addEventListener: vi.fn()
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
        instance.search = 'product 1'
        expect(instance.filteredData).toHaveLength(1)
        expect(instance.filteredData[0].name).toBe('Product 1')
    })

    it('searches across all fields', () => {
        instance = createInstance()
        instance.init()
        instance.search = '29.99'
        expect(instance.filteredData).toHaveLength(1)
        expect(instance.filteredData[0].price).toBe(29.99)
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

    it('returns all data when not paginated', () => {
        instance = createInstance(10, false)
        instance.init()
        expect(instance.pagedData).toEqual(testData)
    })

    it('resets page when searching', () => {
        instance = createInstance(2, false)
        instance.init()

        // Mock $watch to call the callback directly when search is set
        instance.$watch = vi.fn((prop, callback) => {
            if (prop === 'search') {
                // Store the callback for later
                instance._searchWatcher = callback
            }
        })
        instance.init()

        instance.page = 2
        instance.search = 'product'

        // Manually call the search watcher
        if (instance._searchWatcher) {
            instance._searchWatcher()
        }

        expect(instance.page).toBe(1)
    })

    it('handles empty data array', () => {
        instance = createInstance(10, false, null, [])
        instance.init()
        expect(instance.data).toEqual([])
        expect(instance.totalItems).toBe(0)
        expect(instance.pagedData).toEqual([])
    })

    it('handles non-array data', () => {
        instance = createInstance()
        instance.data = null
        expect(instance.filteredData).toEqual([])
        expect(instance.pagedData).toEqual([])
    })

    it('case-insensitive search', () => {
        instance = createInstance()
        instance.init()
        instance.search = 'PRODUCT'
        expect(instance.filteredData).toHaveLength(3)
    })

    it('updates total pages on data change', () => {
        instance = createInstance(2, true)
        instance.init()
        expect(instance.totalPages).toBe(2)

        instance.data = [...testData, { id: 4, name: 'Product 4', price: 59.99 }]
        instance.updateTotalPages()
        expect(instance.totalPages).toBe(2)
    })

    it('fetches data from URL', async () => {
        const mockResponse = {
            success: true,
            data: {
                items: [{ id: 10, name: 'Server Product', price: 99.99 }],
                pagination: { total: 100 }
            }
        }
        vi.stubGlobal('fetch', vi.fn(() =>
            Promise.resolve({
                json: () => Promise.resolve(mockResponse)
            })
        ))

        instance = createInstance(10, true, '/api/products', [])
        instance.init()

        await vi.waitFor(() => {
            expect(instance.data).toEqual(mockResponse.data.items)
            expect(instance.total).toBe(100)
        })
    })

    it('handles URL fetch errors gracefully', async () => {
        const consoleSpy = vi.spyOn(console, 'error').mockImplementation(() => { })
        vi.stubGlobal('fetch', vi.fn(() =>
            Promise.reject(new Error('Network error'))
        ))

        instance = createInstance(10, true, '/api/products', [])
        instance.init()

        await vi.waitFor(() => {
            expect(consoleSpy).toHaveBeenCalled()
        })

        consoleSpy.mockRestore()
    })

    it('does not fetch if URL is not set', async () => {
        const fetchSpy = vi.fn()
        vi.stubGlobal('fetch', fetchSpy)

        instance = createInstance(10, false, null, testData)
        instance.init()

        expect(fetchSpy).not.toHaveBeenCalled()
    })

    it('tracks loading state during fetch', async () => {
        vi.stubGlobal('fetch', vi.fn(() =>
            new Promise(resolve => setTimeout(() => resolve({
                json: () => Promise.resolve({ success: true, data: { items: [], pagination: { total: 0 } } })
            }), 10))
        ))

        instance = createInstance(10, false, '/api/products', [])
        instance.init()

        expect(instance.loading).toBe(true)

        await vi.waitFor(() => {
            expect(instance.loading).toBe(false)
        })
    })
})

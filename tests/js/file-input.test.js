import { describe, it, expect, vi, beforeEach } from 'vitest'
import fileInput from '../../resources/js/alpine/file-input.js'

describe('FileInput Plugin', () => {
    let instance

    beforeEach(() => {
        vi.stubGlobal('URL', {
            createObjectURL: vi.fn(() => 'blob:url'),
            revokeObjectURL: vi.fn()
        })
        // Mock DataTransfer using a function constructor
        const MockDataTransfer = function() {
            this.items = { add: vi.fn() };
            this.files = [];
        };
        vi.stubGlobal('DataTransfer', MockDataTransfer)
    })

    const createInstance = (multiple = false) => {
        const data = fileInput()
        data.$refs = {
            input: { 
                multiple: multiple,
                files: []
            }
        }
        return data
    }

    it('handles file selection', () => {
        instance = createInstance()
        const file = new File(['content'], 'test.txt', { type: 'text/plain' })
        const event = { target: { files: [file] } }
        
        instance.handleFileSelect(event)
        
        expect(instance.files).toHaveLength(1)
        expect(instance.files[0].name).toBe('test.txt')
    })

    it('creates preview for images', () => {
        instance = createInstance()
        const file = new File(['content'], 'test.png', { type: 'image/png' })
        const event = { target: { files: [file] } }
        
        instance.handleFileSelect(event)
        
        expect(URL.createObjectURL).toHaveBeenCalledWith(file)
        expect(instance.files[0].preview).toBe('blob:url')
    })

    it('handles multiple files if enabled', () => {
        instance = createInstance(true)
        const file1 = new File(['1'], '1.txt')
        const file2 = new File(['2'], '2.txt')
        
        instance.addFiles([file1])
        instance.addFiles([file2])
        
        expect(instance.files).toHaveLength(2)
    })

    it('removes files and revokes URLs', () => {
        instance = createInstance()
        const file = new File(['content'], 'test.png', { type: 'image/png' })
        instance.addFiles([file])
        
        instance.removeFile(0)
        expect(instance.files).toHaveLength(0)
        expect(URL.revokeObjectURL).toHaveBeenCalledWith('blob:url')
    })

    it('handles drop events', () => {
        instance = createInstance()
        const file = new File(['content'], 'dropped.txt')
        const event = {
            dataTransfer: { files: [file] },
            preventDefault: vi.fn()
        }
        
        instance.handleDrop(event)
        expect(instance.files).toHaveLength(1)
        expect(instance.files[0].name).toBe('dropped.txt')
        expect(instance.isDropping).toBe(false)
    })
})

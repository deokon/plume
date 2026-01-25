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

    const createInstance = (multiple = false, model = null, uploadUrl = null) => {
        const data = fileInput(model, uploadUrl)
        data.$refs = {
            input: { 
                multiple: multiple,
                files: []
            }
        }
        data.$data = {}
        if (model) {
            data.$data[model] = multiple ? [] : null
        }
        data.$dispatch = vi.fn()
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

    it('uploads files immediately if uploadUrl is provided', async () => {
        let capturedXhr;
        class MockXHR {
            constructor() {
                this.open = vi.fn();
                this.send = vi.fn();
                this.setRequestHeader = vi.fn();
                this.upload = {};
                this.status = 200;
                this.responseText = JSON.stringify({ id: 'file_123' });
                this.onload = null;
                this.onerror = null;
                capturedXhr = this;
            }
        }
        vi.stubGlobal('XMLHttpRequest', MockXHR);

        instance = createInstance(false, 'avatar', '/upload')
        const file = new File(['content'], 'test.txt')
        
        const uploadPromise = instance.addFiles([file])
        
        // Wait for addFiles to create XHR
        await vi.waitFor(() => capturedXhr !== undefined);
        
        // Trigger onload manually
        capturedXhr.onload();
        await uploadPromise;

        expect(capturedXhr.open).toHaveBeenCalledWith('POST', '/upload')
        expect(instance.files[0].id).toBe('file_123')
        expect(instance.$data['avatar']).toBe('file_123')
        expect(instance.$dispatch).toHaveBeenCalledWith('plume-busy')
        expect(instance.$dispatch).toHaveBeenCalledWith('plume-idle')
    })

    it('handles upload errors', async () => {
        let capturedXhr;
        class MockXHR {
            constructor() {
                this.open = vi.fn();
                this.send = vi.fn();
                this.setRequestHeader = vi.fn();
                this.upload = {};
                this.status = 500;
                this.responseText = 'Error';
                this.onload = null;
                this.onerror = null;
                capturedXhr = this;
            }
        }
        vi.stubGlobal('XMLHttpRequest', MockXHR);

        instance = createInstance(false, 'avatar', '/upload')
        const file = new File(['content'], 'test.txt')
        
        const uploadPromise = instance.addFiles([file])
        
        await vi.waitFor(() => capturedXhr !== undefined);
        capturedXhr.onload();
        await uploadPromise;

                expect(instance.files[0].error).toBe('Upload failed')

                expect(instance.$data['avatar']).toBeNull()

                expect(instance.$dispatch).toHaveBeenCalledWith('plume-busy')

                expect(instance.$dispatch).toHaveBeenCalledWith('plume-idle')

            })

        })

        
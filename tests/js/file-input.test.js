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

        instance = createInstance(false, 'data.avatar', '/upload')
        instance.data = { avatar: null } 
        const file = new File(['content'], 'test.txt')
        
        const uploadPromise = instance.addFiles([file])
        
        await vi.waitFor(() => capturedXhr !== undefined);
        capturedXhr.onload();
        await uploadPromise;

        expect(capturedXhr.open).toHaveBeenCalledWith('POST', '/upload')
        expect(instance.files[0].id).toBe('file_123')
        expect(instance.data.avatar).toBe('file_123')
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

        instance = createInstance(false, 'data.avatar', '/upload')
        instance.data = { avatar: null }
        const file = new File(['content'], 'test.txt')
        
        const uploadPromise = instance.addFiles([file])
        
        await vi.waitFor(() => capturedXhr !== undefined);
        capturedXhr.onload();
        await uploadPromise;

        expect(instance.files[0].error).toBe('Upload failed')
        expect(instance.data.avatar).toBeNull()
                expect(instance.$dispatch).toHaveBeenCalledWith('plume-busy')
                expect(instance.$dispatch).toHaveBeenCalledWith('plume-idle')
            })
        
            it('syncs model with deeply nested paths', () => {
                instance = createInstance(false, 'form.data.settings.profile_image', '/upload')
                instance.form = { data: { settings: { profile_image: null } } }
                
                instance.files = [{ id: 'img_999', name: 'p.png', size: 100 }]
                instance.syncModel()
                
                expect(instance.form.data.settings.profile_image).toBe('img_999')
            })

            it('syncs errors to parent form error bag through $data', () => {
                instance = createInstance(false, 'data.avatar', '/upload')
                instance.$data.errors = {}
                
                // Simulate file with error
                instance.files = [{ name: 'test.txt', error: 'File too large' }]
                instance.syncErrors()
                
                expect(instance.$data.errors.avatar).toBe('File too large')
            })

            it('clears errors from parent form when file is added', async () => {
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

                instance = createInstance(false, 'data.avatar', '/upload')
                instance.$data.errors = { avatar: 'Previous error' }
                
                const file = new File(['content'], 'test.txt')
                const uploadPromise = instance.addFiles([file])
                
                // Error should be cleared when new file is added (syncErrors(null) is called in addFiles)
                expect(instance.$data.errors.avatar).toBeUndefined()
                
                await vi.waitFor(() => capturedXhr !== undefined);
                capturedXhr.onload();
                await uploadPromise;
            })

            it('clears errors from parent form when file is removed', () => {
                instance = createInstance(false, 'data.avatar', '/upload')
                instance.$data.errors = { avatar: 'Upload failed' }
                
                const file = new File(['content'], 'test.png', { type: 'image/png' })
                instance.addFiles([file])
                instance.removeFile(0)
                
                expect(instance.$data.errors.avatar).toBeUndefined()
            })

            it('strips data. prefix when syncing errors', () => {
                instance = createInstance(false, 'data.profile_picture', '/upload')
                instance.$data.errors = {}
                
                instance.files = [{ name: 'test.png', error: 'Invalid format' }]
                instance.syncErrors()
                
                // Should use 'profile_picture' as key, not 'data.profile_picture'
                expect(instance.$data.errors.profile_picture).toBe('Invalid format')
                expect(instance.$data.errors['data.profile_picture']).toBeUndefined()
            })

            it('syncs error message when explicitly provided', () => {
                instance = createInstance(false, 'data.file', '/upload')
                instance.$data.errors = {}
                
                instance.syncErrors('Custom error message')
                
                expect(instance.$data.errors.file).toBe('Custom error message')
            })

            it('clears error when null is explicitly provided', () => {
                instance = createInstance(false, 'data.file', '/upload')
                instance.$data.errors = { file: 'Some error' }
                
                instance.syncErrors(null)
                
                expect(instance.$data.errors.file).toBeUndefined()
            })

            it('propagates validation errors from failed upload to parent form', async () => {
                let capturedXhr;
                class MockXHR {
                    constructor() {
                        this.open = vi.fn();
                        this.send = vi.fn();
                        this.setRequestHeader = vi.fn();
                        this.upload = {};
                        this.status = 422;
                        this.responseText = JSON.stringify({ 
                            error: 'File must be an image'
                        });
                        this.onload = null;
                        this.onerror = null;
                        capturedXhr = this;
                    }
                }
                vi.stubGlobal('XMLHttpRequest', MockXHR);

                instance = createInstance(false, 'data.image', '/upload')
                instance.$data.errors = {}
                
                const file = new File(['content'], 'test.txt')
                const uploadPromise = instance.addFiles([file])
                
                await vi.waitFor(() => capturedXhr !== undefined);
                capturedXhr.onload();
                await uploadPromise;
                
                // Error should be propagated to parent form
                expect(instance.$data.errors.image).toBe('File must be an image')
            })
        })
        
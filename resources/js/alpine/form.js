export default function (Alpine) {
    Alpine.data('form', (initialData = {}, config = {}) => ({
        ...initialData,
        
        // Internal tracking of initial state
        _initialData: JSON.parse(JSON.stringify(initialData)),
        
        // State
        processing: false,
        wasSuccessful: false,
        hasFailed: false,
        isDirty: false,
        errors: {},
        message: null,

        // Configuration
        _config: {
            method: 'POST',
            url: null,
            resetOnSuccess: true,
            validateOnChange: false,
            ...config
        },

        init() {
            // Auto-detect action and method from the form element if not provided
            if (!this._config.url && this.$el.tagName === 'FORM' && this.$el.action) {
                this._config.url = this.$el.action;
            }
            if (this.$el.tagName === 'FORM' && this.$el.method) {
                // If it's a GET/POST from browser, it might be uppercase
                this._config.method = this.$el.method.toUpperCase();
            }

            // Watch for changes to calculate dirty state
            this.$watch('$data', () => {
                const currentData = this.getData();
                this.isDirty = JSON.stringify(currentData) !== JSON.stringify(this._initialData);
                
                if (this._config.validateOnChange) {
                    // Logic to clear errors on change could go here
                }
            });
        },
        
        getData() {
            const data = {};
            Object.keys(this._initialData).forEach(key => {
                data[key] = this[key];
            });
            return data;
        },

        async submit(url = null, method = null) {
            this.processing = true;
            this.wasSuccessful = false;
            this.hasFailed = false;
            this.errors = {};
            this.message = null;

            const targetUrl = url || this._config.url;
            const targetMethod = method || this._config.method;

            if (!targetUrl) {
                console.error('Plume Form: No URL specified for submission.');
                this.processing = false;
                return;
            }

            try {
                const response = await fetch(targetUrl, {
                    method: targetMethod,
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                    },
                    body: JSON.stringify(this.getData()),
                });

                const result = await response.json();

                if (response.ok && result.success !== false) {
                    this.handleSuccess(result);
                } else {
                    this.handleFailure(result, response.status);
                }
            } catch (error) {
                this.handleFailure({ message: error.message || 'An unexpected error occurred.' }, 500);
            } finally {
                this.processing = false;
            }
        },

        handleSuccess(result) {
            this.wasSuccessful = true;
            this.message = result.message;
            
            // Merge response data back into form (e.g. updated fields)
            if (result.data) {
                Object.keys(result.data).forEach(key => {
                    if (Object.prototype.hasOwnProperty.call(this._initialData, key)) {
                        this[key] = result.data[key];
                    }
                });
            }
            
            if (this._config.resetOnSuccess) {
                this.reset();
            }

            if (typeof this.onSuccess === 'function') this.onSuccess(result);
            this.$dispatch('form-success', result);

            if (result.redirect) {
                window.location.href = result.redirect;
            }
        },

        handleFailure(result, status) {
            this.hasFailed = true;
            this.message = result.message || 'Validation failed or server error.';
            this.errors = result.errors || {};

            if (typeof this.onError === 'function') this.onError(result);
            this.$dispatch('form-error', result);
        },

        reset() {
            Object.keys(this._initialData).forEach(key => {
                this[key] = this._initialData[key];
            });
            this.errors = {};
            this.isDirty = false;
            this.wasSuccessful = false;
            this.hasFailed = false;
            this.message = null;
        },

        hasError(field) {
            return !!this.errors[field];
        },
        
        getError(field) {
            if (!this.errors[field]) return null;
            return Array.isArray(this.errors[field]) ? this.errors[field][0] : this.errors[field];
        }
    }));
}
import { trigger } from './utils';

export default function (autoplay, interval, model = null, config = {}) {
    return {
        activeSlide: 0,
        slideCount: 0,
        autoplayInterval: null,
        _config: {
            onSlideChange: null,
            ...config,
        },

        init() {
            // Wait for children to render
            this.$nextTick(() => {
                this.slideCount = this.$refs.content.children.length;
                this.updateActive();
            });

            if (model) {
                // Sync with parent Alpine data if available
                if (this.$data && typeof this.$data.data !== 'undefined') {
                    const field = model.replace(/^data\./, '');
                    this.$watch('activeSlide', (val) => (this.$data.data[field] = val));
                    this.$watch('$data.data.' + field, (val) => {
                        if (this.activeSlide !== val) {
                            this.scrollTo(val);
                        }
                    });
                    
                    if (typeof this.$data.data[field] !== 'undefined' && this.$data.data[field] !== null) {
                        this.activeSlide = this.$data.data[field];
                    }
                }
            }

            this.$watch('activeSlide', (value) => {
                this.triggerCallback('onSlideChange', value);
            });

            if (autoplay) {
                this.startAutoplay();
                this.$el.addEventListener('mouseenter', () => this.stopAutoplay());
                this.$el.addEventListener('mouseleave', () => this.startAutoplay());
            }
        },

        startAutoplay() {
            this.autoplayInterval = setInterval(() => {
                this.next();
            }, interval);
        },

        stopAutoplay() {
            clearInterval(this.autoplayInterval);
        },

        updateActive() {
            const scrollLeft = this.$refs.content.scrollLeft;
            const width = this.$refs.content.offsetWidth;
            // Handle division by zero
            if (width > 0) {
                this.activeSlide = Math.round(scrollLeft / width);
            }
        },

        scrollTo(index) {
            const width = this.$refs.content.offsetWidth;
            this.$refs.content.scrollTo({ left: width * index, behavior: 'smooth' });
        },

        next() {
            if (this.activeSlide >= this.slideCount - 1) {
                this.scrollTo(0);
            } else {
                this.scrollTo(this.activeSlide + 1);
            }
        },

        prev() {
            if (this.activeSlide <= 0) {
                this.scrollTo(this.slideCount - 1);
            } else {
                this.scrollTo(this.activeSlide - 1);
            }
        },

        triggerCallback(name, value) {
            trigger(this, name, { index: value });
        },
    };
}

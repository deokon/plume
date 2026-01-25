export default function (autoplay, interval, config = {}) {
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
            const callback = this._config[name];
            if (!callback) return;

            if (typeof callback === 'function') {
                callback(value);
            } else if (typeof callback === 'string') {
                window.Alpine.evaluate(this.$el, callback, {
                    scope: { index: value },
                });
            }
        },
    };
}

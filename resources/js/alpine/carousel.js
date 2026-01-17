export default function (autoplay, interval) {
    return {
        activeSlide: 0,
        slideCount: 0,
        autoplayInterval: null,

        init() {
            // Wait for children to render
            this.$nextTick(() => {
                this.slideCount = this.$refs.content.children.length;
                this.updateActive();
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
    };
}

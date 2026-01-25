export default function (autoplay, config = {}) {
    return {
        playing: autoplay,
        _config: {
            onPlay: null,
            onPause: null,
            onEnded: null,
            ...config,
        },
        toggle() {
            if (this.playing) {
                this.$refs.video.pause();
            } else {
                this.$refs.video.play();
            }
            this.playing = !this.playing;
        },

        triggerCallback(name) {
            const callback = this._config[name];
            if (!callback) return;

            if (typeof callback === 'function') {
                callback();
            } else if (typeof callback === 'string') {
                window.Alpine.evaluate(this.$el, callback);
            }
        },
    };
}

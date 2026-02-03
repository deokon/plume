import { trigger } from './utils';

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

        triggerCallback(name, detail = {}) {
            trigger(this, name, detail);
        },
    };
}

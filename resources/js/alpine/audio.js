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
        
        init() {
            // Keep state in sync with native events even if using native controls
            const audio = this.$refs.audio;
            if (audio) {
                audio.addEventListener('play', () => {
                    this.playing = true;
                    this.triggerCallback('onPlay');
                });
                audio.addEventListener('pause', () => {
                    this.playing = false;
                    this.triggerCallback('onPause');
                });
                audio.addEventListener('ended', () => {
                    this.playing = false;
                    this.triggerCallback('onEnded');
                });
            }
        },

        triggerCallback(name, detail = {}) {
            trigger(this, name, detail);
        },
    };
}

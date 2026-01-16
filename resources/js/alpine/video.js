export default function (autoplay) {
    return {
        playing: autoplay,
        toggle() {
            if (this.playing) {
                this.$refs.video.pause();
            } else {
                this.$refs.video.play();
            }
            this.playing = !this.playing;
        }
    }
}

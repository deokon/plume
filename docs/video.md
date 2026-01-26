# Video

A styled wrapper for HTML5 video, YouTube, and Vimeo content.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `src` | `string` | `null` | Video URL (Direct file, YouTube, or Vimeo). |
| `poster` | `string` | `null` | Poster image URL for native videos. |
| `autoplay` | `bool` | `false` | Whether to start playing automatically. |
| `controls` | `bool` | `true` | Whether to show native player controls. |
| `loop` | `bool` | `false` | Whether to restart automatically after ending. |
| `muted` | `bool` | `false` | Whether to start with audio disabled. |
| `aspect` | `string` | `'video'` | Aspect ratio: 'video' (16:9), 'square' (1:1), 'cinema' (21:9). |
| `onPlay` | `string` | `null` | AlpineJS expression or function to call when playback starts. |
| `onPause` | `string` | `null` | AlpineJS expression or function to call when playback pauses. |
| `onEnded` | `string` | `null` | AlpineJS expression or function to call when playback ends. |

## Usage

```blade
<x-plume::video 
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ" 
    aspect="video" 
/>

<x-plume::video 
    src="/assets/promo.mp4" 
    poster="/assets/promo-thumb.jpg" 
    autoplay 
    muted 
/>
```

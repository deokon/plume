# Video

A styled wrapper for HTML5 video and remote embeds.

## Overview

The Video component provides a consistent interface for embedding local video files or remote platforms like YouTube and Vimeo.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `src` | `string` | `null` | **Required.** Video URL. |
| `poster` | `string` | `null` | Preview image URL. |
| `autoplay` | `boolean` | `false` | Start automatically. |
| `controls` | `boolean` | `true` | Show playback controls. |
| `loop` | `boolean` | `false` | Restart when finished. |
| `muted` | `boolean` | `false` | Start muted. |
| `aspect` | `string` | `'video'` | Aspect ratio (e.g., `video`, `cinema`). |

## Usage

### Local Video

```blade
<x-plume::video src="/path/to/video.mp4" poster="/path/to/poster.jpg" />
```

### Remote Embed (YouTube)

```blade
<x-plume::video src="https://www.youtube.com/embed/dQw4w9WgXcQ" aspect="video" />
```

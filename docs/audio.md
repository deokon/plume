# Audio

A styled native HTML5 audio player wrapper.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `src` | `string` | `null` | The URL of the audio file. |
| `autoplay` | `bool` | `false` | Whether to start playing automatically. |
| `controls` | `bool` | `true` | Whether to show the audio controls. |
| `loop` | `bool` | `false` | Whether to restart the audio automatically when it ends. |
| `muted` | `bool` | `false` | Whether the audio should be muted by default. |

## Usage

```blade
<x-plume::audio src="/assets/podcast.mp3" />
```

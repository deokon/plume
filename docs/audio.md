# Audio

A styled wrapper for HTML5 audio content.

## Overview

The Audio component provides a simple, styled interface for playing audio files directly in the browser.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `src` | `string` | `null` | **Required.** URL of the audio file. |
| `autoplay` | `boolean` | `false` | Whether to start playing automatically. |
| `controls` | `boolean` | `true` | Show default browser audio controls. |
| `loop` | `boolean` | `false` | Restart audio when finished. |
| `muted` | `boolean` | `false` | Start audio muted. |

## Usage

### Basic Usage

```blade
<x-plume::audio src="https://www.w3schools.com/html/horse.mp3" />
```

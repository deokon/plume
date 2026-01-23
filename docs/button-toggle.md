# Button Toggle

Button that toggles between two states.

## Overview

The Button Toggle component provides a way to visually switch between two labels or styles based on an AlpineJS variable.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `var` | `string` | `null` | **Required.** AlpineJS variable name to bind to. |
| `on` | `string` | `null` | Label when variable is true. |
| `off` | `string` | `null` | Label when variable is false. |
| `style` | `string` | `null` | Style when variable is true. |
| `offStyle` | `string` | `null` | Style when variable is false. |

## Usage

### Basic Toggle

```blade
<div x-data="{ isMuted: false }">
    <x-plume::button.toggle 
        var="isMuted" 
        on="Unmute" 
        off="Mute"
        style="primary"
        offStyle="outline"
    />
</div>
```

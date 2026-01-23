# Alert

Displays a callout for user attention.

## Overview

Alerts provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `style` | `string` | `'info'` | Variant: `info`, `success`, `warning`, `destructive`. |
| `title` | `string` | `null` | Optional header text. |
| `icon` | `string` | `null` | Custom icon name (overrides default for style). |
| `closable` | `boolean` | `false` | Whether the alert can be dismissed. |
| `autoclose` | `number` | `null` | Duration in ms before auto-hiding. |

## Usage

### Basic Styles

```blade
<x-plume::alert style="info">Account updated.</x-plume::alert>
<x-plume::alert style="success">Operation successful.</x-plume::alert>
<x-plume::alert style="warning">Low disk space.</x-plume::alert>
<x-plume::alert style="destructive">System error occurred.</x-plume::alert>
```

### With Titles

```blade
<x-plume::alert style="info" title="Update Available">
    A new version of Plume UI is now available.
</x-plume::alert>
```

### Closable & Auto-close

```blade
<x-plume::alert closable>Dismissible alert.</x-plume::alert>
<x-plume::alert autoclose="5000">This will vanish in 5 seconds.</x-plume::alert>
```

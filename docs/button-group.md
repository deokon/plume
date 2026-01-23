# Button Group

Groups related buttons together.

## Overview

The Button Group component allows you to combine multiple buttons into a single unit, often used for toolbars or related action sets.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `size` | `string` | `null` | Controls size of all child buttons. |
| `style` | `string` | `null` | Controls style of all child buttons. |
| `shape` | `string` | `null` | Controls shape of all child buttons. |
| `stack` | `boolean` | `false` | Whether to stack buttons vertically. |

## Usage

### Basic Usage

```blade
<x-plume::button-group style="outline" size="sm">
    <x-plume::button>First</x-plume::button>
    <x-plume::button>Second</x-plume::button>
    <x-plume::button>Third</x-plume::button>
</x-plume::button-group>
```

### Stacking

```blade
<x-plume::button-group stack class="w-48">
    <x-plume::button>Top</x-plume::button>
    <x-plume::button>Middle</x-plume::button>
    <x-plume::button>Bottom</x-plume::button>
</x-plume::button-group>
```

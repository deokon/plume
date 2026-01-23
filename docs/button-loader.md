# Button Loader

Button with built-in loading state management.

## Overview

The Button Loader component automatically toggles a spinner icon based on an AlpineJS variable, simplifying the implementation of feedback during asynchronous operations.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `var` | `string` | `null` | **Required.** AlpineJS variable name to watch for loading state. |
| `size` | `string` | `'md'` | Button size. |
| `style` | `string` | `'primary'` | Button style. |

## Usage

### Basic Example

```blade
<div x-data="{ isProcessing: false }">
    <x-plume::button.loader 
        var="isProcessing" 
        @click="isProcessing = true; setTimeout(() => isProcessing = false, 3000)"
    >
        Process Payment
    </x-plume::button.loader>
</div>
```

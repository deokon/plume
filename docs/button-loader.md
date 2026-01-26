# Button Loader

A button that displays a loading spinner based on an AlpineJS boolean state.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `var` | `string` | `null` | The name of the AlpineJS boolean variable that controls the loading state. |
| `size` | `string` | `'md'` | Size of the button: 'sm', 'md', 'lg'. |
| `style` | `string` | `null` | Visual style of the button. |

## Usage

```blade
<div x-data="{ isBusy: false }">
    <x-plume::button.loader 
        var="isBusy" 
        @click="isBusy = true; setTimeout(() => isBusy = false, 2000)"
    >
        Submit Process
    </x-plume::button.loader>
</div>
```

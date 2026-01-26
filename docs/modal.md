# Modal

A dialog box or popup window that is displayed on top of the current page. Closes when clicking the backdrop or pressing the ESC key unless 'persistent' is true.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `name` | `string` | `null` | Unique identifier for the modal, used with $openModal(name). |
| `show` | `bool` | `false` | Whether to show the modal by default on page load. |
| `persistent` | `bool` | `false` | Whether to prevent closing when clicking the backdrop or pressing the ESC key. |
| `maxWidth` | `string` | `'2xl'` | Maximum width: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl', 'full'. |
| `title` | `string` | `null` | Simple title string. For complex headers, use the 'header' slot. |
| `onOpen` | `string` | `null` | AlpineJS expression or function to call when the modal opens. |
| `onClose` | `string` | `null` | AlpineJS expression or function to call when the modal closes. |

## Usage

### Basic Usage
```blade
<x-plume::modal name="login-modal" title="Welcome Back">
    <x-plume::form ...>
        ...
    </x-plume::form>
</x-plume::modal>

<x-plume::button @click="$openModal('login-modal')">Login</x-plume::button>
```

### Persistent Modal (Prevent accidental closing)
```blade
<x-plume::modal name="unsaved-changes" title="Unsaved Changes" persistent>
    <p>You have unsaved changes. Are you sure you want to leave?</p>
    <x-slot:footer>
        <x-plume::button @click="$closeModal()">Stay</x-plume::button>
        <x-plume::button style="error" href="/dashboard">Leave Page</x-plume::button>
    </x-slot:footer>
</x-plume::modal>
```

### Lazy Loading Content
For modals with heavy content, use a template to delay rendering until the modal is opened:
```blade
<x-plume::modal name="heavy-report">
    <template x-if="show">
        <livewire:detailed-report />
    </template>
</x-plume::modal>
```

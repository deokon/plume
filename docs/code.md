# Code

A component for displaying code snippets with optional syntax highlighting label and a copy-to-clipboard feature.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `language` | `string` | `null` | Programming language name for label and CSS class. |
| `title` | `string` | `null` | Optional filename or title for the code block. |
| `code` | `string` | `null` | The code content. If provided as a prop, content is NOT parsed by Blade. |

## Usage

### Basic Usage
```blade
<x-plume::code language="javascript" title="app.js">
    console.log('Hello Plume!');
</x-plume::code>
```

### Displaying Blade/HTML
Important: Blade components inside the slot will be rendered by Laravel. To display literal tags, wrap them in `@verbatim` or use the `code` prop:

```blade
<x-plume::code language="blade">
    @verbatim
    <x-plume::button>Literal Tag</x-plume::button>
    @endverbatim
</x-plume::code>
```

# Code

A component for displaying code snippets with optional syntax highlighting label and a copy-to-clipboard feature.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `language` | `string` | `null` | Programming language name for label and CSS class. |
| `title` | `string` | `null` | Optional filename or title for the code block. |
| `code` | `string` | `null` | The code content. If not provided, the slot will be used. |

## Usage

```blade
<x-plume::code language="javascript" title="app.js">
    console.log('Hello Plume!');
</x-plume::code>
```

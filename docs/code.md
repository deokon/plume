# Code

A component for displaying code snippets with a copy-to-clipboard feature.

## Overview

The Code component provides a styled container for technical snippets, including syntax labeling and an integrated copy button.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `language` | `string` | `null` | Language name for the label (e.g., `blade`, `bash`, `js`). |
| `title` | `string` | `null` | Optional file name or title. |
| `code` | `string` | `null` | The code to display (can also use the slot). |

## Usage

### Simple Usage

```blade
<x-plume::code language="bash">
composer require deokon/plume
</x-plume::code>
```

### With Title

```blade
<x-plume::code language="blade" title="example.blade.php">
&lt;x-plume::button&gt;Click Me&lt;/x-plume::button&gt;
</x-plume::code>
```

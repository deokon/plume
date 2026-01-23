# Empty State

Placeholder for empty lists or pages.

## Overview

Use the Empty State component to provide feedback when a search returns no results or a list is empty, often providing a call to action.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `title` | `string` | `'No results found'` | Main heading text. |
| `description` | `string` | `null` | Subtitle text. |
| `icon` | `string` | `'icon-[fluent--search-info-24-regular]'` | Icon name. |

## Usage

### Basic Usage

```blade
<x-plume::empty-state 
    title="No posts yet" 
    description="Start by creating your first blog post." 
    icon="icon-[fluent--document-add-24-regular]"
>
    <x-plume::button>Create Post</x-plume::button>
</x-plume::empty-state>
```

# Command Palette

A powerful search and action interface accessible via keyboard shortcuts.

## Overview

The Command Palette (inspired by CMD+K menus) allows users to quickly navigate your application or trigger common actions using their keyboard.

## Properties

### Command (Container)

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `trigger` | `string` | `null` | Keyboard shortcut to open (e.g., `k`). |
| `placeholder` | `string` | `'Type a command...'` | Search input placeholder. |

### Command Group

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `title` | `string` | `null` | Group header text. |

### Command Item

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `value` | `string` | `null` | Searchable value for this item. |
| `icon` | `string` | `null` | Icon name. |
| `shortcut` | `string` | `null` | Visual shortcut hint. |
| `onSelect` | `string` | `null` | AlpineJS expression to execute on selection. |

## Usage

### Simple Palette

```blade
<x-plume::command trigger="k">
    <x-plume::command.group title="Navigation">
        <x-plume::command.item icon="icon-[fluent--home-24-regular]" value="Home" onSelect="window.location = '/'" />
        <x-plume::command.item icon="icon-[fluent--book-24-regular]" value="Docs" onSelect="window.location = '/docs'" />
    </x-plume::command.group>
    
    <x-plume::command.group title="Actions">
        <x-plume::command.item icon="icon-[fluent--add-24-regular]" value="New Post" shortcut="N" onSelect="alert('Creating post...')" />
    </x-plume::command.group>
</x-plume::command>
```

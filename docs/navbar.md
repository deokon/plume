# Navbar

A top-level navigation component for site-wide links and actions.

## Overview

The Navbar component provides a standard structure for application headers, including responsive mobile navigation.

## Properties

### Navbar Item

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `href` | `string` | `'#'` | Link destination. |
| `active` | `boolean` | `false` | Whether the item is the current page. |

### Navbar Mobile Item

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `href` | `string` | `'#'` | Link destination. |
| `active` | `boolean` | `false` | Whether the item is the current page. |

## Usage

### Complete Navbar

```blade
<x-plume::navbar>
    <x-plume::navbar.logo>
        <img src="/logo.svg" class="h-8" alt="Logo" />
    </x-plume::navbar.logo>

    <x-plume::navbar.menu>
        <x-plume::navbar.item href="/" active>Home</x-plume::navbar.item>
        <x-plume::navbar.item href="/docs">Docs</x-plume::navbar.item>
    </x-plume::navbar.menu>

    <x-plume::navbar.mobile-toggle />

    <x-plume::navbar.mobile-menu>
        <x-plume::navbar.mobile-item href="/" active>Home</x-plume::navbar.mobile-item>
        <x-plume::navbar.mobile-item href="/docs">Docs</x-plume::navbar.mobile-item>
    </x-plume::navbar.mobile-menu>
</x-plume::navbar>
```

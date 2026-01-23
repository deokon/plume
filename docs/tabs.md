# Tabs

Toggle between layered sections of content.

## Overview

Tabs organize content into multiple views that can be accessed one at a time, making efficient use of space.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `default` | `string` | `'1'` | ID of the tab to show by default. |
| `side` | `string` | `'top'` | Tab bar position: `top`, `bottom`, `left`, `right`. |
| `size` | `string` | `'md'` | Tab sizing: `sm`, `md`, `lg`. |
| `style` | `string` | `'default'` | Visual style: `default`, `pills`, `underline`. |

## Usage

### Simple Underline Tabs

```blade
<x-plume::tabs default="profile" style="underline">
    <x-plume::tabs.group>
        <x-plume::tabs.item for="profile">Profile</x-plume::tabs.item>
        <x-plume::tabs.item for="security">Security</x-plume::tabs.item>
        <x-plume::tabs.item for="billing">Billing</x-plume::tabs.item>
    </x-plume::tabs.group>

    <x-plume::tabs.panel for="profile">
        <p>Manage your public profile information.</p>
    </x-plume::tabs.panel>
    <x-plume::tabs.panel for="security">
        <p>Update your password and authentication settings.</p>
    </x-plume::tabs.panel>
    <x-plume::tabs.panel for="billing">
        <p>Review your recent invoices and payment methods.</p>
    </x-plume::tabs.panel>
</x-plume::tabs>
```

# Breadcrumb

Displays the path to the current resource using a hierarchy of links.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `items` | `array` | `[]` | Array of link items: [['label' => 'Home', 'href' => '/', 'active' => false]]. |
| `separator` | `string` | `'icon-[fluent--chevron-right-24-regular]'` | The character or icon name to use as a separator. |

## Usage

```blade
<x-plume::breadcrumb 
    :items="[
        ['label' => 'Dashboard', 'href' => '/admin'],
        ['label' => 'Users', 'href' => '/admin/users'],
        ['label' => 'Edit User', 'active' => true]
    ]" 
/>
```

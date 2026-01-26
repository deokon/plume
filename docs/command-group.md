# Command Group

A container for grouping related command items within a command palette.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `title` | `string` | `null` | The label for the group. |

## Usage

```blade
<x-plume::command>
    <x-plume::command.group title="Actions">
        <x-plume::command.item>Save File</x-plume::command.item>
    </x-plume::command.group>
</x-plume::command>
```

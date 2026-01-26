# Skeleton

A placeholder component to indicate loading state for specific shapes or content blocks.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `shape` | `string` | `'rect'` | The shape of the skeleton: 'rect', 'circle', 'text'. |
| `animation` | `string` | `'pulse'` | The animation style: 'pulse', 'wave', 'none'. |

## Usage

```blade
Profile Placeholder:
<div class="flex items-center gap-4">
    <x-plume::skeleton shape="circle" class="size-12" />
    <div class="space-y-2">
        <x-plume::skeleton shape="text" class="w-24 h-4" />
        <x-plume::skeleton shape="text" class="w-32 h-3" />
    </div>
</div>
```

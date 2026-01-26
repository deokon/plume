{{--
@component x-plume::form.actions
@description A flex container for form-level action buttons (typically Submit and Cancel).
@usage
Standardized layout for form buttons, typically used at the bottom of a form:
```blade
<x-plume::form.actions>
    <x-plume::button style="minor" @click="window.history.back()">
        Cancel
    </x-plume::button>
    <x-plume::button type="submit">
        Save Changes
    </x-plume::button>
</x-plume::form.actions>
```
--}}
<div {{ $attributes->merge(['class' => 'flex items-center justify-end gap-3']) }}>
    {{ $slot }}
</div>

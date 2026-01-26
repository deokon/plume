{{--
@component x-plume::form.actions
@description A flex container for form-level action buttons (typically Submit and Cancel).
@usage
<x-plume::form.actions>
    <x-plume::button style="minor">Cancel</x-plume::button>
    <x-plume::button type="submit">Save Changes</x-plume::button>
</x-plume::form.actions>
--}}
<div {{ $attributes->merge(['class' => 'flex items-center justify-end gap-3']) }}>
    {{ $slot }}
</div>

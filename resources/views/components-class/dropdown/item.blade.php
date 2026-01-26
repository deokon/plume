{{--
@component x-plume::dropdown.item
@description An actionable item within a dropdown menu.
@prop string $style (Default: 'ghost')
--}}
<x-plume::button :style="$style"
    {{ $attributes->merge([
        'class' =>
            'w-full justify-start rounded-none first:rounded-t-md last:rounded-b-md px-4 py-2 text-sm',
    ]) }}
    full-width>
    {{ $slot }}
</x-plume::button>

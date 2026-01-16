@props(['style' => 'primary'])
<x-plume::button :style="$style" {{ $attributes }}>
    {{ $slot }}
</x-plume::button>

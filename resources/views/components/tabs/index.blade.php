{{--
@component x-plume::tabs
@prop {number} default - Default: 1
@prop {string} side - Default: top
--}}
@props([
    'default' => '1',
    'side' => 'top',
])

<div
    x-data="{ activeTab: '{{ $default }}' }"
    {{ $attributes->merge(['class' => 'w-full']) }}
>
    <div class="flex {{ match($side) { 'left' => 'flex-row', 'right' => 'flex-row-reverse', default => 'flex-col' } }}">
        {{ $slot }}
    </div>
</div>

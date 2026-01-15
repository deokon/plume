{{--
@component x-plume::tabs
@description A set of layered sections of content, known as tab panels, that are displayed one at a time.
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

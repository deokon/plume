@use('deokon\Plume\Theme')
{{--
@component x-plume::tabs
@description A set of layered sections of content, known as tab panels, that are displayed one at a time.
--}}
@props([
    'default' => '1',
    'side' => 'top',
])

<div x-data="{ activeTab: '{{ $default }}' }" {{ $attributes->merge(['class' => 'w-full']) }}>
    <div class="flex {{ Theme::tabs($side) }}">
        {{ $slot }}
    </div>
</div>

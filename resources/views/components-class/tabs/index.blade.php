{{--
@component x-plume::tabs
@description A set of layered sections of content, known as tab panels, that are displayed one at a time.
--}}
<div x-data="{ activeTab: '{{ $default }}' }" {{ $attributes->merge(['class' => 'w-full']) }}>
    <div class="flex {{ $directionClass }}">
        {{ $slot }}
    </div>
</div>
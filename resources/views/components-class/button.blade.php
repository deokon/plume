{{--
@component x-plume::button
@description Displays a button or a component that looks like a button.
--}}
@if ($href === null)
    <button type="button" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon)
            <x-plume::icon i="{{ $icon }}" />
        @endif
        {{ $slot }}
    </button>
@else
    <a href="{{ $href ?? '#' }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon)
            <x-plume::icon i="{{ $icon }}" />
        @endif
        {{ $slot }}
    </a>
@endif
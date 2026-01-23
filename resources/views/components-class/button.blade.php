{{--
@component x-plume::button
@description Displays a button or a component that looks like a button.
@prop string $href (Default: null)
@prop string $icon (Default: null)
@prop bool $fullWidth (Default: false)
@prop string $size (Default: null)
@prop string $style (Default: null)
@prop string $shape (Default: null)
--}}
@aware([
    'groupSize' => null,
    'groupStyle' => null,
    'groupShape' => null,
])
@php
    [$resolvedSize, $resolvedStyle, $resolvedShape] = $component->resolveStyleProps($attributes, [
        'size' => $groupSize,
        'style' => $groupStyle,
        'shape' => $groupShape,
    ]);
    $cleanAttributes = $component->cleanAttributes($attributes);
@endphp
@if ($href === null)
    <button {{ $cleanAttributes->merge(['type' => 'button', 'class' => $component->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
        @if ($icon)
            <x-plume::icon i="{{ $icon }}" />
        @endif
        {{ $slot }}
    </button>
@elseif($method)
    <form action="{{ $href }}" method="POST" class="inline">
        @csrf
        @method($method)
        <button type="submit" {{ $cleanAttributes->merge(['class' => $component->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
            @if ($icon)
                <x-plume::icon i="{{ $icon }}" />
            @endif
            {{ $slot }}
        </button>
    </form>
@else
    <a href="{{ $href ?? '#' }}" {{ $cleanAttributes->merge(['class' => $component->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
        @if ($icon)
            <x-plume::icon i="{{ $icon }}" />
        @endif
        {{ $slot }}
    </a>
@endif

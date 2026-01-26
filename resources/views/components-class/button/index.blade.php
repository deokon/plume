{{--
@component x-plume::button
@description Displays a button or a component that looks like a button.
@prop string $href (Default: null)
@prop string $method (Default: null)
@prop string $icon (Default: null)
@prop bool $fullWidth (Default: false)
@prop string $size (Default: null)
@prop string $style (Default: null)
@prop string $shape (Default: null)
@prop string $confirm (Default: null)
@prop string $onSuccess (Default: null)
@prop string $onError (Default: null)
--}}
@aware([
    'groupSize' => null,
    'groupStyle' => null,
    'groupShape' => null,
])
@php
    $buttonComponent = $component;
    [$resolvedSize, $resolvedStyle, $resolvedShape] = $buttonComponent->resolveStyleProps(
        $attributes,
        [
            'size' => $groupSize,
            'style' => $groupStyle,
            'shape' => $groupShape,
        ],
    );
    $cleanAttributes = $buttonComponent->cleanAttributes($attributes);
    $confirmSlot =
        isset($confirm) &&
        $confirm instanceof \Illuminate\View\ComponentSlot &&
        $confirm->isNotEmpty()
            ? $confirm
            : null;
    $hasConfirm = ($confirm && is_string($confirm)) || $confirmSlot;
    $confirmMessage = $confirmSlot ? trim(strip_tags((string) $confirmSlot)) : (string) $confirm;
    $clickAction = $hasConfirm
        ? 'if (!confirm(' . Js::from($confirmMessage) . ')) { $event.preventDefault(); $event.stopImmediatePropagation(); return false; }'
        : null;
@endphp

@if ($method && $href)
    <x-plume::form :action="$href" :method="$method" :onSuccess="$onSuccess" :onError="$onError" :showAlerts="false" inline>
        <button type="submit" @if ($clickAction) x-on:click="{{ $clickAction }}" @endif
            {{ $cleanAttributes->merge(['class' => $buttonComponent->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
            @if ($icon)
                <x-plume::icon i="{{ $icon }}" />
            @endif
            {{ $slot }}
        </button>
    </x-plume::form>
@elseif($href)
    <a href="{{ $href }}" @if ($clickAction) x-on:click="{{ $clickAction }}" @endif
        {{ $cleanAttributes->merge(['class' => $buttonComponent->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
        @if ($icon)
            <x-plume::icon i="{{ $icon }}" />
        @endif
        {{ $slot }}
    </a>
@else
    <button type="button" @if ($clickAction) x-on:click="{{ $clickAction }}" @endif
        {{ $cleanAttributes->merge(['class' => $buttonComponent->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
        @if ($icon)
            <x-plume::icon i="{{ $icon }}" />
        @endif
        {{ $slot }}
    </button>
@endif
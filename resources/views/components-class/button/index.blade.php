{{--
@component x-plume::button
@description Displays a button or a component that looks like a button.
@prop string $href (Default: null) URL to navigate to or submit to. Renders as an <a> tag unless $method is provided.
@prop string $method (Default: null) HTTP method for AJAX submission (POST, PUT, PATCH, DELETE).
@prop string $icon (Default: null) Iconify icon name (e.g., 'icon-[fluent--add-24-regular]').
@prop bool $fullWidth (Default: false) Whether the button should take up the full width of its container.
@prop string $size (Default: null) Size of the button: 'sm', 'md', 'lg'.
@prop string $style (Default: null) Visual style: 'default', 'secondary', 'error', 'outline', 'ghost', 'link', 'minor'.
@prop string $shape (Default: null) Shape: 'default', 'pill', 'round'.
@prop string $confirm (Default: null) Native confirmation message to display before action.
@prop string $onSuccess (Default: null) AlpineJS expression or callback function to execute on success.
@prop string $onError (Default: null) AlpineJS expression or callback function to execute on error.
@usage
<x-plume::button style="primary" icon="icon-[fluent--save-24-regular]">Save Changes</x-plume::button>

<x-plume::button 
    href="/users/1" 
    method="DELETE" 
    confirm="Are you sure you want to delete this user?"
    onSuccess="$success('User deleted')">
    Delete User
</x-plume::button>
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
            {{ $cleanAttributes->merge(['class' => $buttonComponent->classes($resolvedSize, $resolvedStyle, $resolvedShape) . ' relative']) }}
            x-bind:class="{ '[&>:not(:last-child)]:invisible': processing }">
            <span>
                @if ($icon)
                    <x-plume::icon i="{{ $icon }}" />
                @endif
                {{ $slot }}
            </span>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 grayscale"
                x-show="processing" x-cloak>
                <x-plume::spinner size="sm" style="white" />
            </div>
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
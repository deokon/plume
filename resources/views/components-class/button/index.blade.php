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
    $confirmId = 'confirm-' . \Illuminate\Support\Str::random(8);
@endphp

@if ($hasConfirm)
    <div x-data="{ confirmed: false }" class="inline">
        <x-plume::alert-dialog :name="$confirmId" :onConfirm="'$dispatch(\'confirm-' . $confirmId . '\')'">
            {{ $confirmSlot ?? $confirm }}
        </x-plume::alert-dialog>

        @if ($href === null)
            <button x-ref="btn"
                x-on:click="if (!confirmed) { $event.preventDefault(); $openModal(\'{{ $confirmId }}\'); }"
                @confirm-{{ $confirmId }}.window="confirmed = true; $nextTick(() => $el.click())"
                {{ $cleanAttributes->merge(['type' => 'button', 'class' => $buttonComponent->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
                @if ($icon)
                    <x-plume::icon i="{{ $icon }}" />
                @endif
                {{ $slot }}
            </button>
        @elseif($method)
            <x-plume::form :action="$href" :method="$method" :onSuccess="$onSuccess" :onError="$onError"
                :showAlerts="false" inline>
                <button x-ref="btn" type="submit"
                    x-on:click="if (!confirmed) { $event.preventDefault(); $openModal(\'{{ $confirmId }}\'); }"
                    @confirm-{{ $confirmId }}.window="confirmed = true; $nextTick(() => $el.click())"
                    {{ $cleanAttributes->merge(['class' => $buttonComponent->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
                    @if ($icon)
                        <x-plume::icon i="{{ $icon }}" />
                    @endif
                    {{ $slot }}
                </button>
            </x-plume::form>
        @else
            <a x-ref="btn" href="{{ $href ?? '#' }}"
                x-on:click="if (!confirmed) { $event.preventDefault(); $openModal(\'{{ $confirmId }}\'); }"
                @confirm-{{ $confirmId }}.window="confirmed = true; $nextTick(() => $el.click())"
                {{ $cleanAttributes->merge(['class' => $buttonComponent->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
                @if ($icon)
                    <x-plume::icon i="{{ $icon }}" />
                @endif
                {{ $slot }}
            </a>
        @endif
    </div>
@else
    @if ($href === null)
        <button
            {{ $cleanAttributes->merge(['type' => 'button', 'class' => $buttonComponent->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
            @if ($icon)
                <x-plume::icon i="{{ $icon }}" />
            @endif
            {{ $slot }}
        </button>
    @elseif($method)
        <x-plume::form :action="$href" :method="$method" :onSuccess="$onSuccess" :onError="$onError"
            :showAlerts="false" inline>
            <button type="submit"
                {{ $cleanAttributes->merge(['class' => $buttonComponent->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
                @if ($icon)
                    <x-plume::icon i="{{ $icon }}" />
                @endif
                {{ $slot }}
            </button>
        </x-plume::form>
    @else
        <a href="{{ $href ?? '#' }}"
            {{ $cleanAttributes->merge(['class' => $buttonComponent->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
            @if ($icon)
                <x-plume::icon i="{{ $icon }}" />
            @endif
            {{ $slot }}
        </a>
    @endif
@endif

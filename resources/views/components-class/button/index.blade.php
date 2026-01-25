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
    $confirmSlot = $__laravel_slots['confirm'] ?? null;
    $hasConfirm = $confirm || $confirmSlot;
    $confirmId = 'confirm-' . \Illuminate\Support\Str::random(8);
@endphp

@if ($hasConfirm)
    <div x-data="{ confirmed: false }" class="inline">
        <x-plume::alert-dialog :name="$confirmId" :onConfirm="'confirmed = true; $nextTick(() => $refs.btn.click())'">
            {{ $confirmSlot ?? $confirm }}
        </x-plume::alert-dialog>

        @if ($href === null)
            <button x-ref="btn"
                x-on:click="if (!confirmed) { $event.preventDefault(); $openModal('{{ $confirmId }}'); }"
                {{ $cleanAttributes->merge(['type' => 'button', 'class' => $component->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
                @if ($icon)
                    <x-plume::icon i="{{ $icon }}" />
                @endif
                {{ $slot }}
            </button>
        @elseif($method)
            <form action="{{ $href }}" method="POST" class="inline">
                @csrf
                @method($method)
                <button x-ref="btn" type="submit"
                    x-on:click="if (!confirmed) { $event.preventDefault(); $openModal('{{ $confirmId }}'); }"
                    {{ $cleanAttributes->merge(['class' => $component->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
                    @if ($icon)
                        <x-plume::icon i="{{ $icon }}" />
                    @endif
                    {{ $slot }}
                </button>
            </form>
        @else
            <a x-ref="btn" href="{{ $href ?? '#' }}"
                x-on:click="if (!confirmed) { $event.preventDefault(); $openModal('{{ $confirmId }}'); }"
                {{ $cleanAttributes->merge(['class' => $component->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
                @if ($icon)
                    <x-plume::icon i="{{ $icon }}" />
                @endif
                {{ $slot }}
            </a>
        @endif
    </div>
@else
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
@endif

{{--
@component x-plume::form.input
@description Standard text input fields, including password and number variants.
--}}
@aware([
    'name' => null,
    'model' => null,
    'groupName' => null,
    'groupModel' => null,
])
@php
    $resolvedName = $attributes->get('name', $groupName ?? $name);
    $resolvedModel = $attributes->get('model', $groupModel ?? $model);
    $resolvedId = $attributes->get('id', $component->resolveId($resolvedName, $resolvedModel, $id, $value));
    $classes = $component->inputClasses($icon, isset($rightSide));
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    @if (isset($after) && $after instanceof \Illuminate\View\ComponentSlot && $after->isNotEmpty())
        <x-slot:after>{{ $after }}</x-slot:after>
    @elseif(isset($after))
        <x-slot:after>{{ $after }}</x-slot:after>
    @endif
    <div class="relative rounded-md shadow-sm">
        @if ($icon)
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <x-plume::icon i="{{ $icon }}"
                    class="h-5 w-5 text-foreground/50 dark:text-background-400" />
            </div>
        @endif
        <input type="{{ $type }}" name="{{ $resolvedName }}" id="{{ $resolvedId }}"
            value="{{ $value }}"
            @if ($placeholder !== '') placeholder="{{ $placeholder }}" @endif
            @if ($resolvedModel) x-model="{{ $resolvedModel }}" @endif
            {{ $attributes->except(['name', 'model', 'id'])->merge(['class' => $classes]) }}>
        @if (isset($rightSide) && $rightSide instanceof \Illuminate\View\ComponentSlot && $rightSide->isNotEmpty())
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                {{ $rightSide }}
            </div>
        @elseif(isset($rightSide))
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                {{ $rightSide }}
            </div>
        @endif
    </div>
</x-plume::form.element>
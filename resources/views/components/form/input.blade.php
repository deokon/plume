{{--
@component x-plume::form.input
@description Standard text input fields, including password and number variants.
--}}
@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'type' => 'text',
    'model' => null,
    'value' => '',
    'placeholder' => '',
    'icon' => null,
    'after' => null,
])
@php
    $name = $name ?? $model;
    $id = \deokon\Plume\Form::resolveId($name, $model, $id);
    $classes = \deokon\Plume\Form::inputClasses($icon, isset($rightSide));
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
    @if($after ?? null)
        <x-slot:after>{{ $after }}</x-slot:after>
    @endif
    <div class="relative rounded-md shadow-sm">
        @if ($icon)
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <x-plume::icon i="{{ $icon }}" class="h-5 w-5 text-foreground/50 dark:text-background-400" />
            </div>
        @endif
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $id }}"
            value="{{ $value }}"
            @if($placeholder !== '') placeholder="{{ $placeholder }}" @endif
            @if($model) x-model="{{ $model }}" @endif
            {{ $attributes->merge(['class' => $classes]) }}
        >
        @if ($rightSide ?? null)
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                {{ $rightSide }}
            </div>
        @endif
    </div>
</x-plume::form.element>
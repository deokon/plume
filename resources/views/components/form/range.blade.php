{{--
@component x-plume::form.range
@prop {null} label -  (Default: null)
@prop {null} name -  (Default: null)
@prop {null} id -  (Default: null)
@prop {null} model -  (Default: null)
@prop {number} min -  (Default: 0)
@prop {number} max -  (Default: 100)
@prop {number} step -  (Default: 1)
@prop {null} value -  (Default: null)
--}}
@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'model' => null,
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'value' => null, // Initial value
])
@php
    $name = $name ?? $model;
    $id = $id ?? Str::slug($name, '_');
@endphp

<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
<div class="flex items-center gap-4">
    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="range"
        min="{{ $min }}"
        max="{{ $max }}"
        step="{{ $step }}"
        value="{{ $value }}"
        @if($model) x-model="{{ $model }}" @endif
        {{ $attributes->merge(['class' => 'w-full h-2 bg-background-700/40 rounded-lg appearance-none cursor-pointer dark:bg-background-400/20']) }}
    >
    @if($model)
        <span class="text-sm text-foreground/50 dark:text-background-400" x-text="{{ $model }}"></span>
    @endif
</div>
</x-plume::form.element>

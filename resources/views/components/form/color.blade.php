{{--
@component x-plume::form.color
@prop {null} label - Default: null
@prop {null} name - Default: null
@prop {null} id - Default: null
@prop {null} model - Default: null
@prop {string} value - Default: #000000
--}}
@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'model' => null,
    'value' => '#000000',
])
@php
    $name = $name ?? $model;
    $id = $id ?? Str::slug($name, '_');
    $classes = 'block size-10 border rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-background-50 dark:bg-background-700 border-background-700/40 dark:border-background-400/20';
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
    <div class="flex items-center space-x-2">
        <input
            type="color"
            name="{{ $name }}"
            id="{{ $id }}"
            value="{{ $value }}"
            @if($model) x-model="{{ $model }}" @endif
            {{ $attributes->merge(['class' => $classes]) }}
       >
    </div>
</x-plume::form.element>

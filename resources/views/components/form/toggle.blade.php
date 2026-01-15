{{--
@component x-plume::form.toggle
@description Switch toggle for binary states.
@prop {null} label -  (Default: null)
@prop {null} name -  (Default: null)
@prop {null} id -  (Default: null)
@prop {null} model -  (Default: null)
@prop {number} value -  (Default: 1)
@prop {boolean} checked -  (Default: false)
--}}
@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'model' => null,
    'value' => '1', // Default value when checked
    'checked' => false,
])
@php
    $name = $name ?? $model;
    $id = $id ?? Str::slug($name, '_');
@endphp

<x-plume::form.element :name="$name" :id="$id" :model="$model">
    <label class="relative inline-flex items-center cursor-pointer">
        <input 
            type="checkbox" 
            id="{{ $id }}"
            name="{{ $name }}" 
            @if($model) x-model="{{ $model }}" @endif 
            class="sr-only peer"
        >
        <div class="w-11 h-6 bg-background-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 dark:peer-focus:ring-primary/50 rounded-full peer dark:bg-background-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:border-background-200 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:after:border-background-700 peer-checked:bg-primary"></div>
        @if($label ?? $slot->isNotEmpty())
            <span class="ml-3 text-sm font-medium">{{ $label ?? $slot }}</span>
        @endif
    </label>
</x-plume::form.element>

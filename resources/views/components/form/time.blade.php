{{--
@component x-plume::form.time
@prop {null} label -  (Default: null)
@prop {null} name -  (Default: null)
@prop {null} id -  (Default: null)
@prop {null} model -  (Default: null)
@prop {string} value -  (Default: )
--}}
@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'model' => null,
    'value' => '',
])
@php
    $classes = 'block w-full px-3 py-2 border rounded-md shadow-sm placeholder-foreground/50 dark:placeholder-background-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-background-50 dark:bg-background-700 border-background-700/40 dark:border-background-400/20';
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
    <input
        type="time"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ $value }}"
        @if($model) x-model="{{ $model }}" @endif
        {{ $attributes->merge(['class' => $classes]) }}
    >
</x-plume::form.element>

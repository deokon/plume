{{--
@component x-plume::form.number
@prop {null} label -  (Default: null)
@prop {null} name -  (Default: null)
@prop {null} id -  (Default: null)
@prop {null} model -  (Default: null)
@prop {number} value -  (Default: 0)
@prop {number} min -  (Default: 0)
@prop {number} max -  (Default: 100)
@prop {number} step -  (Default: 1)
@prop {null} after -  (Default: null)
--}}
@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'model' => null,
    'value' => 0,
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'after' => null,
])
@php
    $classes = 'block w-full px-3 py-2 border rounded-md shadow-sm placeholder-foreground/50 dark:placeholder-background-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-background-50 dark:bg-background-700 text-center border-background-700/40 dark:border-background-400/20';
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
    @if($after)
        <x-slot:after>{{ $after }}</x-slot:after>
    @endif
        <input
            type="number"
            name="{{ $name }}"
            id="{{ $id }}"
            min="{{ $min }}"
            max="{{ $max }}"
            step="{{ $step }}"
            value="{{ $value }}"
            @if($model) x-model.number="{{ $model }}" @endif
            {{ $attributes->merge(['class' => $classes]) }}
        >
</x-plume::form.element>

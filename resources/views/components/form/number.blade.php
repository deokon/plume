@use('deokon\Plume\Form')
{{--
@component x-plume::form.number
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
    $name = $name ?? $model;
    $id = Form::resolveId($name, $model, $id);
    $classes = Form::inputClasses() . ' text-center';
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

@use('deokon\Plume\Form')
{{--
@component x-plume::form.date
@description Date, time, and datetime inputs.
--}}
@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'model' => null,
    'value' => '',
])
@php
    $name = $name ?? $model;
    $id = Form::resolveId($name, $model, $id);
    $classes = Form::inputClasses();
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
    <input
        type="date"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ $value }}"
        @if($model) x-model="{{ $model }}" @endif
        {{ $attributes->merge(['class' => $classes]) }}
    >
</x-plume::form.element>

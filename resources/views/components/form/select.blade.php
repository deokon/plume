@use('deokon\Plume\Form')
{{--
@component x-plume::form.select
@description Dropdown selection field.
--}}
@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'model' => null,
    'after' => null,
])
@php
    $name = $name ?? $model;
    $id = Form::resolveId($name, $model, $id);
    $classes = Form::inputClasses();
@endphp
<x-plume::form.element :label="$label" :name="$name" :id="$id" :model="$model">
    @if ($after)
        <x-slot:after>{{ $after }}</x-slot:after>
    @endif
    <select name="{{ $name }}" id="{{ $id }}"
        @if ($model) x-model="{{ $model }}" @endif
        {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </select>
</x-plume::form.element>

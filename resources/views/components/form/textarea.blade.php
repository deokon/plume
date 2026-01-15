@use('deokon\Plume\Form')
{{--
@component x-plume::form.textarea
@description Multi-line text input field.
--}}
@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'rows' => 3,
    'model' => null,
    'placeholder' => '',
    'after' => null,
])
@php
    $name = $name ?? $model;
    $id = Form::resolveId($name, $model, $id);
    $classes = Form::inputClasses();
@endphp
<x-plume::form.element :label="$label" :name="$name" :id="$id" :model="$model">
    @if($after)
        <x-slot:after>{{ $after }}</x-slot:after>
    @endif
    <textarea
        name="{{ $name }}"
        id="{{ $id }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        @if($model) x-model="{{ $model }}" @endif
        {{ $attributes->merge(['class' => $classes]) }}
    >{{ $slot }}</textarea>
</x-plume::form.element>

{{--
@component x-plume::form.radio
@description Radio buttons for selecting a single option from a set.
--}}
@props([
    'label' => null,
    'id' => null,
    'value' => '',
])
@aware(['name', 'model'])
@php
    $id = $id ?? Str::slug($name . ' ' . $value, '_');
@endphp
<div class="flex items-center">
    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="radio"
        value="{{ $value }}"
        @if($model) x-model="{{ $model }}" @endif
        {{ $attributes->merge(['class' => 'h-4 w-4 text-primary border-background-700/40 dark:border-background-400/20 focus:ring-primary']) }}
    >
    <label for="{{ $id }}" class="ml-2 block text-sm">
        {{ $label ?? $slot }}
    </label>
</div>

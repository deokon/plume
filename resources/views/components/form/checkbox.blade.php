@props([
    'label' => null,
    'id' => null,
    'value' => '',
])
@aware(['name' => null, 'model' => null])
@php
    $id = $id ?? Str::slug(($name ?? '') . ' ' . $value, '_');
@endphp
<div class="flex items-center">
    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="checkbox"
        value="{{ $value }}"
        @if($model) x-model="{{ $model }}" @endif
        {{ $attributes->merge(['class' => 'h-4 w-4 text-primary border-background-700/40 dark:border-background-400/20 rounded focus:ring-primary']) }}
    >
    <label for="{{ $id }}" class="ml-2 block text-sm">
        {{ $label ?? $slot }}
    </label>
</div>

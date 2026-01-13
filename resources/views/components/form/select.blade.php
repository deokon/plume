@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'model' => null,
    'after' => null,
])
@php
    $classes = 'block w-full px-3 py-2 border rounded-md shadow-sm placeholder-foreground/50 dark:placeholder-background-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-background-50 dark:bg-background-700 border-background-700/40 dark:border-background-400/20';
@endphp
<x-plume::form.element :label="$label" :name="$name" :id="$id" :model="$model">
    @if($after)
        <x-slot:after>{{ $after }}</x-slot:after>
    @endif
    <select
        name="{{ $name }}"
        id="{{ $id }}"
        @if($model) x-model="{{ $model }}" @endif
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </select>
</x-plume::form.element>

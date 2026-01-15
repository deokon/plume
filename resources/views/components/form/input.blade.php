{{--
@component x-plume::form.input
@description Standard text input fields, including password and number variants.
@prop {null} label - The label for the input. (Default: null)
@prop {null} name -  (Default: null)
@prop {null} id -  (Default: null)
@prop {string} type - Input type (text, email, etc). (Default: text)
@prop {null} model - AlpineJS model name. (Default: null)
@prop {string} value -  (Default: )
@prop {string} placeholder -  (Default: )
@prop {null} icon - Icon class. (Default: null)
@prop {null} after -  (Default: null)
--}}
@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'type' => 'text',
    'model' => null,
    'value' => '',
    'placeholder' => '',
    'icon' => null,
    'after' => null,
])
@php
    $name = $name ?? $model;
    $id = $id ?? Str::slug($name, '_');
    $classes = 'block w-full px-3 py-2 border rounded-md shadow-sm placeholder-foreground/50 dark:placeholder-background-400 border-background-700/40 dark:border-background-400/20 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-background-50 dark:bg-background-700'
        . ($icon ? ' pl-10' : '')
        . (($rightSide ?? null) ? ' pr-10' : '') // Add right padding if rightSide slot is present
    ;
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
    @if($after ?? null)
        <x-slot:after>{{ $after }}</x-slot:after>
    @endif
    <div class="relative rounded-md shadow-sm">
        @if ($icon)
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <x-plume::icon i="{{ $icon }}" class="h-5 w-5 text-foreground/50 dark:text-background-400" />
            </div>
        @endif
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $id }}"
            value="{{ $value }}"
            @if($placeholder !== '') placeholder="{{ $placeholder }}" @endif
            @if($model) x-model="{{ $model }}" @endif
            {{ $attributes->merge(['class' => $classes]) }}
        >
        @if ($rightSide ?? null)
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                {{ $rightSide }}
            </div>
        @endif
    </div>
</x-plume::form.element>

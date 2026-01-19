{{--
@component x-plume::form.select
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    [$resolvedName, $resolvedModel, $resolvedId] = $component->resolveFormAttributes($attributes->all(), $groupName, $groupModel);
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <select name="{{ $resolvedName }}" id="{{ $resolvedId }}"
        @if ($multiple) multiple @endif @if ($resolvedModel) x-model="{{ $resolvedModel }}" @endif
        {{ $attributes->except(['name', 'model', 'id'])->merge(['class' => 'block w-full px-3 py-2 border rounded-md shadow-sm border-background-700/40 dark:border-background-400/20 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-background-50 dark:bg-background-700 transition-colors']) }}>
        @if ($placeholder)
            <option value="" disabled selected>{{ $placeholder }}</option>
        @endif
        @foreach ($options as $val => $labelOption)
            <option value="{{ $val }}">{{ $labelOption }}</option>
        @endforeach
        {{ $slot }}
    </select>
</x-plume::form.element>

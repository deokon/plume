{{--
@component x-plume::form.number
@description A numeric input field.
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    [$resolvedName, $resolvedModel, $resolvedId] = $component->resolveFormAttributes($attributes->all(), $groupName, $groupModel);
@endphp
<x-plume::form.input type="number" :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel"
    :value="$value" :placeholder="$placeholder" :min="$min" :max="$max" :step="$step"
    icon="icon-[fluent--number-row-24-regular]" {{ $attributes->except(['name', 'model', 'id']) }} />

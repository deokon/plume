{{--
@component x-plume::form.datetime
@description A date and time picker input.
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    [$resolvedName, $resolvedModel, $resolvedId] = $component->resolveFormAttributes($attributes->all(), $groupName, $groupModel);
@endphp
<x-plume::form.input type="datetime-local" :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId"
    :model="$resolvedModel" :value="$value" :placeholder="$placeholder"
    icon="icon-[fluent--calendar-clock-24-regular]" {{ $attributes->except(['name', 'model', 'id']) }} />

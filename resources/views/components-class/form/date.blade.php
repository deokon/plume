{{--
@component x-plume::form.date
@description A date picker input.
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    [$resolvedName, $resolvedModel, $resolvedId] = $component->resolveFormAttributes($attributes->all(), $groupName, $groupModel);
@endphp
<x-plume::form.input type="date" :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel"
    :value="$value" :placeholder="$placeholder" icon="icon-[fluent--calendar-ltr-24-regular]" {{ $attributes->except(['name', 'model', 'id']) }} />

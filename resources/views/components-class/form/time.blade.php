{{--
@component x-plume::form.time
@description A native time picker input with integrated label and validation support.
@prop string $label (Default: null) The label for the time input.
@prop string $name (Default: null) HTML name attribute.
@prop string $id (Default: null) HTML id attribute. Auto-generated from name if not provided.
@prop string $model (Default: null) AlpineJS model name for two-way binding.
@prop string $value (Default: '') Initial time value (HH:mm). Ignored if $model is used.
@prop string $placeholder (Default: '') Placeholder text.
@usage
<x-plume::form.time 
    label="Preferred Time" 
    model="booking.time" 
    required 
/>
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    [$resolvedName, $resolvedModel, $resolvedId] = $component->resolveFormAttributes(
        $attributes->all(),
        $groupName,
        $groupModel,
    );
@endphp
<x-plume::form.input type="time" :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId"
    :model="$resolvedModel" :value="$value" :placeholder="$placeholder" icon="icon-[fluent--clock-24-regular]"
    {{ $attributes->except(['name', 'model', 'id']) }} />

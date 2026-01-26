{{--
@component x-plume::form.datetime
@description A native date and time picker input with integrated label and validation support.
@prop string $label (Default: null) The label for the input.
@prop string $name (Default: null) HTML name attribute.
@prop string $id (Default: null) HTML id attribute. Auto-generated from name if not provided.
@prop string $model (Default: null) AlpineJS model name for two-way binding.
@prop string $value (Default: '') Initial value (YYYY-MM-DDTHH:mm). Ignored if $model is used.
@prop string $placeholder (Default: '') Placeholder text.
@usage
<x-plume::form.datetime 
    label="Event Start" 
    model="event.starts_at" 
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
<x-plume::form.input type="datetime-local" :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId"
    :model="$resolvedModel" :value="$value" :placeholder="$placeholder"
    icon="icon-[fluent--calendar-clock-24-regular]"
    {{ $attributes->except(['name', 'model', 'id']) }} />

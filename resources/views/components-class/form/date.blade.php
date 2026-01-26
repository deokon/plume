{{--
@component x-plume::form.date
@description A native date picker input with integrated label and validation support.
@prop string $label (Default: null) The label for the date input.
@prop string $name (Default: null) HTML name attribute.
@prop string $id (Default: null) HTML id attribute. Auto-generated from name if not provided.
@prop string $model (Default: null) AlpineJS model name for two-way binding.
@prop string $value (Default: '') Initial date value (YYYY-MM-DD). Ignored if $model is used.
@prop string $placeholder (Default: '') Placeholder text (browser support varies for type="date").
@usage
<x-plume::form.date 
    label="Birthday" 
    model="profile.birthday" 
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
<x-plume::form.input type="date" :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId"
    :model="$resolvedModel" :value="$value" :placeholder="$placeholder"
    icon="icon-[fluent--calendar-ltr-24-regular]"
    {{ $attributes->except(['name', 'model', 'id']) }} />

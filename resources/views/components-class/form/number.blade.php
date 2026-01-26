{{--
@component x-plume::form.number
@description A numeric input field with min, max, and step constraints.
@prop string $label (Default: null) The label for the number input.
@prop string $name (Default: null) HTML name attribute.
@prop string $id (Default: null) HTML id attribute. Auto-generated from name if not provided.
@prop string $model (Default: null) AlpineJS model name for two-way binding.
@prop string $value (Default: null) Initial numeric value. Ignored if $model is used.
@prop int $min (Default: null) Minimum allowed value.
@prop int $max (Default: null) Maximum allowed value.
@prop int $step (Default: null) Incremental step value.
@prop string $placeholder (Default: '') Placeholder text.
@usage
<x-plume::form.number 
    label="Quantity" 
    model="cart.qty" 
    min="1" 
    max="10" 
    step="1"
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
<x-plume::form.input type="number" :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId"
    :model="$resolvedModel" :value="$value" :placeholder="$placeholder" :min="$min" :max="$max"
    :step="$step" icon="icon-[fluent--number-row-24-regular]"
    {{ $attributes->except(['name', 'model', 'id']) }} />

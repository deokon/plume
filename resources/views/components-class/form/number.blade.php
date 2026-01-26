{{--
@component x-plume::form.number
@description A numeric input field.
@prop string $label (Default: null)
@prop string $name (Default: null)
@prop string $id (Default: null)
@prop string $model (Default: null)
@prop string $value (Default: null)
@prop int $min (Default: null)
@prop int $max (Default: null)
@prop int $step (Default: null)
@prop string $placeholder (Default: '')
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

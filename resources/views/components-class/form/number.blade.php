{{--
@component x-plume::form.number
--}}
<x-plume::form.input type="number" :label="$label ?? $slot" :name="$name" :id="$id" :model="$model"
    :value="$value" :placeholder="$placeholder" :min="$min" :max="$max" :step="$step"
    icon="icon-[fluent--number-row-24-regular]" />
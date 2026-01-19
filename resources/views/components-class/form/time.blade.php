{{--
@component x-plume::form.time
--}}
<x-plume::form.input type="time" :label="$label ?? $slot" :name="$name" :id="$id" :model="$model"
    :value="$value" :placeholder="$placeholder" icon="icon-[fluent--clock-24-regular]" />
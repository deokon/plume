{{--
@component x-plume::form.datetime
--}}
<x-plume::form.input type="datetime-local" :label="$label ?? $slot" :name="$name" :id="$id"
    :model="$model" :value="$value" :placeholder="$placeholder"
    icon="icon-[fluent--calendar-clock-24-regular]" />
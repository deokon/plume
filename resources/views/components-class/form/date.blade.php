{{--
@component x-plume::form.date
--}}
<x-plume::form.input type="date" :label="$label ?? $slot" :name="$name" :id="$id" :model="$model"
    :value="$value" :placeholder="$placeholder" icon="icon-[fluent--calendar-ltr-24-regular]" />
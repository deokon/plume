{{--
@component x-plume::form.group
--}}
@props([
    'label' => null,
    'description' => '',
    'name' => null,
    'model' => null,
    'minCols' => 1,
    'maxCols' => null,
])
<x-plume::form.element :name="$name" :model="$model" {{ $attributes }}>
    <x-plume::form.section :title="$label ?? $slot" :description="$description" :minCols="$minCols" :maxCols="$maxCols"
        {{ $attributes }}>
        {{ $slot }}
    </x-plume::form.section>
</x-plume::form.element>

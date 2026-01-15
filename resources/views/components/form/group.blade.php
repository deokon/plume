{{--
@component x-plume::form.group
@prop {null} label -  (Default: null)
@prop {string} description -  (Default: )
@prop {null} name -  (Default: null)
@prop {null} model -  (Default: null)
@prop {number} minCols -  (Default: 1)
@prop {null} maxCols -  (Default: null)
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
    <x-plume::form.section :title="$label ?? $slot" :description="$description" :minCols="$minCols" :maxCols="$maxCols" {{ $attributes }}>
        {{ $slot }}
    </x-plume::form.section>
</x-plume::form.element>

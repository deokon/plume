{{--
@component x-plume::form.file
--}}
<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
    <input type="file" name="{{ $name }}" id="{{ $id }}"
        @if ($multiple) multiple @endif @if ($model) x-model="{{ $model }}" @endif
        {{ $attributes->merge(['class' => 'block w-full text-sm text-foreground/50 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition-colors']) }}>
</x-plume::form.element>
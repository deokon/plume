{{--
@component x-plume::form.color
--}}
<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
    <div class="flex items-center gap-3">
        <input type="color" name="{{ $name }}" id="{{ $id }}"
            value="{{ $value }}"
            @if ($model) x-model="{{ $model }}" @endif
            {{ $attributes->merge(['class' => 'size-10 rounded-md border-0 p-0 overflow-hidden cursor-pointer bg-transparent']) }}>
        <span class="text-sm font-mono text-foreground/50 uppercase" x-text="{{ $model }}"></span>
    </div>
</x-plume::form.element>
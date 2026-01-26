{{--
@component x-plume::form.color
@description A native color picker input with hex value display.
@prop string $label (Default: null) The label for the color input.
@prop string $name (Default: null) HTML name attribute.
@prop string $id (Default: null) HTML id attribute. Auto-generated if not provided.
@prop string $model (Default: null) AlpineJS model name for two-way binding.
@prop string $value (Default: '#000000') Initial hex color value. Ignored if $model is used.
@usage
<x-plume::form.color 
    label="Brand Color" 
    model="brand_hex" 
    value="#3b82f6" 
/>
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $color = $component;
    [$resolvedName, $resolvedModel, $resolvedId] = $color->resolveFormAttributes(
        $attributes->all(),
        $groupName,
        $groupModel,
    );
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <div class="flex items-center gap-3">
        <input type="color" name="{{ $resolvedName }}" id="{{ $resolvedId }}"
            value="{{ $value }}"
            @if ($resolvedModel) x-model="{{ $resolvedModel }}"
                :aria-invalid="hasError('{{ $resolvedModel }}')"
                :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null" @endif
            {{ $attributes->except(['name', 'model', 'id'])->merge(['class' => 'size-10 rounded-md border-0 p-0 overflow-hidden cursor-pointer bg-transparent']) }}>
        @if ($resolvedModel)
            <span class="text-sm font-mono text-foreground/50 uppercase"
                x-text="{{ $resolvedModel }}"></span>
        @endif
    </div>
</x-plume::form.element>

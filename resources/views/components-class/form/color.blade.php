{{--
@component x-plume::form.color
@description A color picker input.
@prop string $label (Default: null)
@prop string $name (Default: null)
@prop string $id (Default: null)
@prop string $model (Default: null)
@prop string $value (Default: '#000000')
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $color = $component;
    [$resolvedName, $resolvedModel, $resolvedId] = $color->resolveFormAttributes($attributes->all(), $groupName, $groupModel);
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <div class="flex items-center gap-3">
        <input type="color" name="{{ $resolvedName }}" id="{{ $resolvedId }}"
            value="{{ $value }}"
            @if ($resolvedModel) 
                x-model="{{ $resolvedModel }}"
                :aria-invalid="hasError('{{ $resolvedModel }}')"
                :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null"
            @endif
            {{ $attributes->except(['name', 'model', 'id'])->merge(['class' => 'size-10 rounded-md border-0 p-0 overflow-hidden cursor-pointer bg-transparent']) }}>
        @if ($resolvedModel)
            <span class="text-sm font-mono text-foreground/50 uppercase" x-text="{{ $resolvedModel }}"></span>
        @endif
    </div>
</x-plume::form.element>

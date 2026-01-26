{{--
@component x-plume::form.range
@description A slider input for selecting a numeric value from a range with dynamic value display.
@prop string $label (Default: null) The label for the range input.
@prop string $name (Default: null) HTML name attribute.
@prop string $id (Default: null) HTML id attribute. Auto-generated if not provided.
@prop string $model (Default: null) AlpineJS model name for two-way binding.
@prop string $value (Default: '0') Initial range value. Ignored if $model is used.
@prop int $min (Default: 0) Minimum allowed value.
@prop int $max (Default: 100) Maximum allowed value.
@prop int $step (Default: 1) Incremental step value.
@usage
<x-plume::form.range 
    label="Volume" 
    model="settings.volume" 
    min="0" 
    max="100" 
    step="5"
/>
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $range = $component;
    [$resolvedName, $resolvedModel, $resolvedId] = $range->resolveFormAttributes(
        $attributes->all(),
        $groupName,
        $groupModel,
    );
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <div class="flex flex-col gap-2">
        <input type="range" name="{{ $resolvedName }}" id="{{ $resolvedId }}"
            min="{{ $min }}" max="{{ $max }}" step="{{ $step }}"
            value="{{ $value }}"
            @if ($resolvedModel) x-model="{{ $resolvedModel }}"
                :aria-invalid="hasError('{{ $resolvedModel }}')"
                :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null" @endif
            {{ $attributes->except(['name', 'model', 'id'])->merge(['class' => 'w-full h-2 bg-background-200 dark:bg-background-700 rounded-lg appearance-none cursor-pointer accent-primary']) }}>
        <div class="flex justify-between text-[10px] font-mono text-foreground/40">
            <span>{{ $min }}</span>
            @if ($resolvedModel)
                <span x-text="{{ $resolvedModel }}"></span>
            @else
                <span>{{ $value }}</span>
            @endif
            <span>{{ $max }}</span>
        </div>
    </div>
</x-plume::form.element>

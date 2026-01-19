{{--
@component x-plume::form.range
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    [$resolvedName, $resolvedModel, $resolvedId] = $component->resolveFormAttributes($attributes->all(), $groupName, $groupModel);
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <div class="flex flex-col gap-2">
        <input type="range" name="{{ $resolvedName }}" id="{{ $resolvedId }}"
            min="{{ $min }}" max="{{ $max }}" step="{{ $step }}"
            value="{{ $value }}"
            @if ($resolvedModel) x-model="{{ $resolvedModel }}" @endif
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

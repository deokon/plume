{{--
@component x-plume::form.checkbox
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    [$resolvedName, $resolvedModel, $resolvedId] = $component->resolveFormAttributes($attributes->all(), $groupName, $groupModel);
@endphp
<x-plume::form.element :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <div class="flex items-center gap-3">
        <div class="relative flex items-center justify-center">
            <input type="checkbox" name="{{ $resolvedName }}" id="{{ $resolvedId }}"
                value="{{ $value }}" @if ($checked) checked @endif
                @if ($resolvedModel) x-model="{{ $resolvedModel }}" @endif
                {{ $attributes->except(['name', 'model', 'id'])->merge(['class' => 'peer size-5 shrink-0 appearance-none rounded-md border-2 border-background-700/40 bg-background transition-all checked:bg-primary checked:border-primary focus:outline-none focus:ring-2 focus:ring-primary/50 disabled:opacity-50 dark:border-background-400/20 dark:bg-background-800']) }}>
            <x-plume::icon i="icon-[fluent--checkmark-24-regular]"
                class="absolute size-3.5 text-primary-foreground opacity-0 transition-opacity peer-checked:opacity-100 pointer-events-none" />
        </div>
        @if ($label || $slot->isNotEmpty())
            <label for="{{ $resolvedId }}"
                class="text-sm font-medium text-foreground cursor-pointer select-none">
                {{ $label ?? $slot }}
            </label>
        @endif
    </div>
</x-plume::form.element>
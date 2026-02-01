{{--
@component x-plume::form.radio
@description A radio button for single selection from a group of options.
@prop string $label (Default: null) The label text for the radio button.
@prop string $name (Default: null) HTML name attribute. Must be the same for all radios in a group.
@prop string $id (Default: null) HTML id attribute. Auto-generated if not provided.
@prop string $model (Default: null) AlpineJS model name for two-way binding.
@prop string $value (Default: '') The value submitted when this radio is selected.
@prop bool $checked (Default: false) Whether this radio is initially selected.
@usage
<x-plume::form.group label="Plan">
    <x-plume::form.radio name="plan" value="basic" label="Basic" model="selectedPlan" />
    <x-plume::form.radio name="plan" value="pro" label="Pro" model="selectedPlan" />
</x-plume::form.group>
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $radio = $component;
    [$resolvedName, $resolvedModel, $resolvedId] = $radio->resolveFormAttributes(
        $attributes->all(),
        $groupName,
        $groupModel,
    );
@endphp
<x-plume::form.element :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <div class="flex items-center gap-3">
        <div class="relative flex items-center justify-center">
            <input type="radio" name="{{ $resolvedName }}" id="{{ $resolvedId }}"
                value="{{ $value }}" @if ($checked) checked @endif
                @if ($resolvedModel) x-model="{{ $resolvedModel }}"
                    :aria-invalid="hasError('{{ $resolvedModel }}')"
                    :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null" @endif
                {{ $attributes->except(['name', 'model', 'id'])->merge(['class' => 'peer size-5 shrink-0 appearance-none rounded-full border-2 border-background-700/40 bg-background transition-all checked:bg-primary checked:border-primary focus:outline-none focus:ring-2 focus:ring-primary/50 disabled:opacity-50 dark:border-background-400/20 dark:bg-background-800']) }}>
            <div
                class="absolute size-2 rounded-full bg-primary-foreground opacity-0 transition-opacity peer-checked:opacity-100 pointer-events-none">
            </div>
        </div>
        @if ($label || $slot->isNotEmpty())
            <label for="{{ $resolvedId }}"
                class="text-sm font-medium text-foreground dark:text-background-400 cursor-pointer select-none">
                {{ $label ?? $slot }}
            </label>
        @endif
    </div>
</x-plume::form.element>

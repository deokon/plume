{{--
@component x-plume::form.checkbox
@description A checkbox input for binary selection or boolean state.
@prop string $label (Default: null) The label text for the checkbox.
@prop string $name (Default: null) HTML name attribute.
@prop string $id (Default: null) HTML id attribute. Auto-generated if not provided.
@prop string $model (Default: null) AlpineJS model name for two-way binding.
@prop string $value (Default: '') The value submitted when the checkbox is checked.
@prop bool $checked (Default: false) Whether the checkbox is initially checked.
@usage
<x-plume::form.checkbox 
    label="Accept Terms" 
    name="terms" 
    model="accept_terms" 
    required 
/>

<x-plume::form.checkbox name="remember" model="remember">
    Remember me
</x-plume::form.checkbox>
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $checkbox = $component;
    [$resolvedName, $resolvedModel, $resolvedId] = $checkbox->resolveFormAttributes(
        $attributes->all(),
        $groupName,
        $groupModel,
    );
@endphp
<x-plume::form.element :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <div class="flex items-center gap-3">
        <div class="relative flex items-center justify-center">
            <input type="checkbox" name="{{ $resolvedName }}" id="{{ $resolvedId }}"
                value="{{ $value }}" @if ($checked) checked @endif
                @if ($resolvedModel) x-model="{{ $resolvedModel }}"
                    :aria-invalid="hasError('{{ $resolvedModel }}')"
                    :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null" @endif
                {{ $attributes->except(['name', 'model', 'id'])->merge(['class' => 'peer size-5 shrink-0 appearance-none rounded-md border-2 border-background-700/40 bg-background transition-all checked:bg-primary checked:border-primary focus:outline-none focus:ring-2 focus:ring-primary/50 disabled:opacity-50 dark:border-background-400/20 dark:bg-background-800']) }}>
            <x-plume::icon i="icon-[fluent--checkmark-24-regular]"
                class="absolute size-3.5 text-primary-foreground opacity-0 transition-opacity peer-checked:opacity-100 pointer-events-none" />
        </div>
        @if ($label || $slot->isNotEmpty())
            <label for="{{ $resolvedId }}"
                class="text-sm font-medium text-foreground dark:text-background-400 cursor-pointer select-none">
                {{ $label ?? $slot }}
            </label>
        @endif
    </div>
</x-plume::form.element>

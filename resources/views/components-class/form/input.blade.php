{{--
@component x-plume::form.input
@description Standard text input fields with integrated label, validation errors, and icon support.
@prop string $label (Default: null) The label for the input field.
@prop string $name (Default: null) HTML name attribute. Auto-prefixed if using x-plume::form.
@prop string $id (Default: null) HTML id attribute. Auto-generated from name if not provided.
@prop string $model (Default: null) AlpineJS model name (relative to formData). Enables two-way binding.
@prop string $value (Default: '') Initial value for the input. Ignored if $model is used.
@prop string $type (Default: 'text') HTML input type (text, email, tel, etc.).
@prop string $placeholder (Default: '') Placeholder text.
@prop string $icon (Default: null) Iconify icon name to display inside the input.
@prop bool $required (Inherited) Standard HTML required attribute.
@prop bool $readonly (Inherited) Standard HTML readonly attribute.
@prop bool $disabled (Inherited) Standard HTML disabled attribute.
@usage
<x-plume::form.input 
    label="Email Address" 
    name="email" 
    model="email" 
    type="email" 
    icon="icon-[fluent--mail-24-regular]"
    placeholder="you@example.com"
    required
/>

<x-plume::form.input label="Username" model="username">
    <x-slot:right-side>
        <x-plume::button style="ghost" size="sm">Check Availability</x-plume::button>
    </x-slot:right-side>
</x-plume::form.input>
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $input = $component;
    [$resolvedName, $resolvedModel, $resolvedId] = $input->resolveFormAttributes(
        $attributes->all(),
        $groupName,
        $groupModel,
    );
    $classes = $input->inputClasses($icon, isset($rightSide));
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    @if (isset($after) && $after instanceof \Illuminate\View\ComponentSlot && $after->isNotEmpty())
        <x-slot:after>{{ $after }}</x-slot:after>
    @elseif(isset($after))
        <x-slot:after>{{ $after }}</x-slot:after>
    @endif
    <div class="relative rounded-md shadow-sm">
        @if ($icon)
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <x-plume::icon i="{{ $icon }}"
                    class="h-5 w-5 text-foreground/50 dark:text-background-400" />
            </div>
        @endif
        <input type="{{ $type }}" name="{{ $resolvedName }}" id="{{ $resolvedId }}"
            value="{{ $value }}"
            @if ($placeholder !== '') placeholder="{{ $placeholder }}" @endif
            @if ($resolvedModel) x-model="{{ $resolvedModel }}"
                :aria-invalid="hasError('{{ $resolvedModel }}')"
                :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null" @endif
            {{ $attributes->except(['name', 'model', 'id'])->merge(['class' => $classes]) }}>
        @if (isset($rightSide) &&
                $rightSide instanceof \Illuminate\View\ComponentSlot &&
                $rightSide->isNotEmpty())
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                {{ $rightSide }}
            </div>
        @elseif(isset($rightSide))
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                {{ $rightSide }}
            </div>
        @endif
    </div>
</x-plume::form.element>

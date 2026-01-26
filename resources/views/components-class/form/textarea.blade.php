{{--
@component x-plume::form.textarea
@description A multi-line text input for longer content.
@prop string $label (Default: null) The label for the textarea.
@prop string $name (Default: null) HTML name attribute.
@prop string $id (Default: null) HTML id attribute. Auto-generated if not provided.
@prop string $model (Default: null) AlpineJS model name for two-way binding.
@prop string $value (Default: '') Initial content for the textarea. Ignored if $model is used.
@prop int $rows (Default: 3) The number of visible text lines.
@prop string $placeholder (Default: '') Placeholder text.
@usage
<x-plume::form.textarea 
    label="Biography" 
    model="bio" 
    rows="5" 
    placeholder="Tell us about yourself..." 
/>
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $textarea = $component;
    [$resolvedName, $resolvedModel, $resolvedId] = $textarea->resolveFormAttributes(
        $attributes->all(),
        $groupName,
        $groupModel,
    );
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <textarea name="{{ $resolvedName }}" id="{{ $resolvedId }}" rows="{{ $rows }}"
        @if ($placeholder !== '') placeholder="{{ $placeholder }}" @endif
        @if ($resolvedModel) x-model="{{ $resolvedModel }}"
            :aria-invalid="hasError('{{ $resolvedModel }}')"
            :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null" @endif
        {{ $attributes->except(['name', 'model', 'id'])->merge(['class' => 'block w-full px-3 py-2 border rounded-md shadow-sm placeholder-foreground/50 dark:placeholder-background-400 border-background-700/40 dark:border-background-400/20 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-background-50 dark:bg-background-700 transition-colors']) }}>{{ $value }}</textarea>
</x-plume::form.element>

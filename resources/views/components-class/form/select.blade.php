{{--
@component x-plume::form.select
@description A standard dropdown select input with multi-select support.
@prop string $label (Default: null) The label for the select input.
@prop string $name (Default: null) HTML name attribute.
@prop string $id (Default: null) HTML id attribute. Auto-generated from name if not provided.
@prop string $model (Default: null) AlpineJS model name for two-way binding.
@prop array $options (Default: []) Associative array of options: [value => label].
@prop string $placeholder (Default: null) Placeholder text for the first disabled option.
@prop bool $multiple (Default: false) Whether to allow multiple selections.
@usage
<x-plume::form.select 
    label="Category" 
    model="category_id" 
    :options="['1' => 'Technology', '2' => 'Design']" 
    placeholder="Select a category"
/>

<x-plume::form.select label="Tags" model="tags" multiple>
    <option value="php">PHP</option>
    <option value="laravel">Laravel</option>
</x-plume::form.select>
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $select = $component;
    [$resolvedName, $resolvedModel, $resolvedId] = $select->resolveFormAttributes(
        $attributes->all(),
        $groupName,
        $groupModel,
    );
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <select name="{{ $resolvedName }}" id="{{ $resolvedId }}"
        @if ($multiple) multiple @endif
        @if ($resolvedModel) x-model="{{ $resolvedModel }}"
            :aria-invalid="hasError('{{ $resolvedModel }}')"
            :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null" @endif
        {{ $attributes->except(['name', 'model', 'id'])->merge(['class' => 'block w-full px-3 py-2 border rounded-md shadow-sm border-background-700/40 dark:border-background-400/20 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-background-50 dark:bg-background-700 transition-colors']) }}>
        @if ($placeholder)
            <option value="" disabled selected>{{ $placeholder }}</option>
        @endif
        @foreach ($options as $val => $labelOption)
            <option value="{{ $val }}">{{ $labelOption }}</option>
        @endforeach
        {{ $slot }}
    </select>
</x-plume::form.element>

{{--
@component x-plume::form.toggle
@description A toggle switch for boolean selection.
@prop string $label (Default: null)
@prop string $name (Default: null)
@prop string $id (Default: null)
@prop string $model (Default: null)
@prop string $value (Default: '1')
@prop bool $checked (Default: false)
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $toggle = $component;
    [$resolvedName, $resolvedModel, $resolvedId] = $toggle->resolveFormAttributes($attributes->all(), $groupName, $groupModel);
@endphp
<x-plume::form.element :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <div class="flex items-center gap-3">
        <button type="button" @click="{{ $resolvedModel }} = !{{ $resolvedModel }}"
            class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 bg-background-200 dark:bg-background-700"
            role="switch" :aria-checked="{{ $resolvedModel }}"
            :aria-invalid="hasError('{{ $resolvedModel }}')"
            :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null"
            :class="{ 'bg-primary': {{ $resolvedModel }} }">
            <span aria-hidden="true"
                class="pointer-events-none inline-block size-5 transform rounded-full bg-background shadow ring-0 transition duration-200 ease-in-out"
                :class="{ 'translate-x-5': {{ $resolvedModel }}, 'translate-x-0': !{{ $resolvedModel }} }"></span>
        </button>
        @if ($label || $slot->isNotEmpty())
            <span class="text-sm font-medium text-foreground cursor-pointer select-none"
                @click="{{ $resolvedModel }} = !{{ $resolvedModel }}">
                {{ $label ?? $slot }}
            </span>
        @endif
    </div>
</x-plume::form.element>

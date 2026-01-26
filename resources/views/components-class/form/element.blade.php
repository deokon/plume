{{--
@component x-plume::form.element
@description Base wrapper for form inputs, handling labels and errors.
@prop string $label (Default: '')
@prop string $name (Default: null)
@prop string $id (Default: null)
@prop string $model (Default: null)
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $resolvedModel = $model ?? $groupModel;
    $resolvedId = $id; // ID is usually passed correctly from parent input
@endphp
<div {{ $attributes->merge(['class' => 'space-y-2 rounded-md border border-transparent transition-colors']) }}
    @if ($resolvedModel) x-bind:class="{ 'bg-error-100 dark:bg-error-500/30 border-error-300 dark:border-error-500/50 p-2': hasError('{{ $resolvedModel }}') }" @endif>
    @if ($label)
        <x-plume::form.label :for="$resolvedId">
            {{ $label }}
        </x-plume::form.label>
    @endif
    {{ $slot }}
    @if (isset($after) && $after instanceof \Illuminate\View\ComponentSlot && $after->isNotEmpty())
        {{ $after }}
    @elseif(isset($after))
        {{ $after }}
    @endif
    @if ($resolvedModel)
        <template x-if="hasError('{{ $resolvedModel }}')">
            <p id="{{ $resolvedId }}-error" class="mt-2 text-sm text-error-800 dark:text-error-200"
                x-text="getError('{{ $resolvedModel }}')" aria-live="assertive"></p>
        </template>
    @endif
</div>

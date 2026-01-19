{{--
@component x-plume::form.element
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $resolvedModel = $model ?? $groupModel;
    $resolvedId = $id; // ID is usually passed correctly from parent input
@endphp
<div {{ $attributes->merge(['class' => 'space-y-2 rounded-md border border-transparent transition-colors']) }}
    @if ($resolvedModel) x-bind:class="{ 'bg-destructive/10 border-destructive p-2': hasError('{{ $resolvedModel }}') }" @endif>
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
            <p class="mt-2 text-sm text-destructive" x-text="errors['{{ $resolvedModel }}']"
                aria-live="assertive"></p>
        </template>
    @endif
</div>

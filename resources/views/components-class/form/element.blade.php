{{--
@component x-plume::form.element
--}}
<div {{ $attributes->merge(['class' => 'space-y-2 p-4 rounded-md border border-transparent transition-colors']) }}
    x-bind:class="{ 'bg-destructive/10 border-destructive': hasError('{{ $model }}') }">
    @if ($label)
        <x-plume::form.label :for="$id">
            {{ $label }}
        </x-plume::form.label>
    @endif
    {{ $slot }}
    @if (isset($after) && $after instanceof \Illuminate\View\ComponentSlot && $after->isNotEmpty())
        {{ $after }}
    @elseif(isset($after))
        {{ $after }}
    @endif
    @if ($model)
        <template x-if="hasError('{{ $model }}')">
            <p class="mt-2 text-sm text-destructive" x-text="errors['{{ $model }}']"
                aria-live="assertive"></p>
        </template>
    @endif
</div>
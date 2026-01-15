@use('deokon\Plume\Form')
{{--
@component x-plume::form.element
--}}
@props([
    'label' => '',
    'name' => null,
    'id' => null,
    'model' => null,
    'after' => null,
])
@php
    $name = $name ?? $model;
    $id = Form::resolveId($name, $model, $id);
@endphp
<div {{ $attributes->merge(['class' => 'space-y-2 p-4 rounded-md border border-transparent transition-colors']) }} x-bind:class="{ 'bg-destructive/10 border-destructive': hasError('{{ $model }}') }">
    @if($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-foreground dark:text-background-200">{{ $label }}</label>
    @endif
    {{ $slot }}
    @if($after)
        {{ $after }}
    @endif
    @if($model)
        <template x-if="hasError('{{ $model }}')">
            <p class="mt-2 text-sm text-destructive" x-text="errors['{{ $model }}']" aria-live="assertive"></p>
        </template>
    @endif
</div>

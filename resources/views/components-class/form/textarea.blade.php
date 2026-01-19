{{--
@component x-plume::form.textarea
--}}
<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
    <textarea name="{{ $name }}" id="{{ $id }}" rows="{{ $rows }}"
        @if ($placeholder !== '') placeholder="{{ $placeholder }}" @endif
        @if ($model) x-model="{{ $model }}" @endif
        {{ $attributes->merge(['class' => 'block w-full px-3 py-2 border rounded-md shadow-sm placeholder-foreground/50 dark:placeholder-background-400 border-background-700/40 dark:border-background-400/20 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-background-50 dark:bg-background-700 transition-colors']) }}>{{ $value }}</textarea>
</x-plume::form.element>
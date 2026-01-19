{{--
@component x-plume::form.select
--}}
<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
    <select name="{{ $name }}" id="{{ $id }}"
        @if ($multiple) multiple @endif @if ($model) x-model="{{ $model }}" @endif
        {{ $attributes->merge(['class' => 'block w-full px-3 py-2 border rounded-md shadow-sm border-background-700/40 dark:border-background-400/20 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-background-50 dark:bg-background-700 transition-colors']) }}>
        @if ($placeholder)
            <option value="" disabled selected>{{ $placeholder }}</option>
        @endif
        @foreach ($options as $val => $labelOption)
            <option value="{{ $val }}">{{ $labelOption }}</option>
        @endforeach
    </select>
</x-plume::form.element>
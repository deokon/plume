{{--
@component x-plume::form.range
--}}
<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
    <div class="flex flex-col gap-2">
        <input type="range" name="{{ $name }}" id="{{ $id }}"
            min="{{ $min }}" max="{{ $max }}" step="{{ $step }}"
            value="{{ $value }}"
            @if ($model) x-model="{{ $model }}" @endif
            {{ $attributes->merge(['class' => 'w-full h-2 bg-background-200 dark:bg-background-700 rounded-lg appearance-none cursor-pointer accent-primary']) }}>
        <div class="flex justify-between text-[10px] font-mono text-foreground/40">
            <span x-text="{{ $min }}"></span>
            <span x-text="{{ $model }} || {{ $value }}"></span>
            <span x-text="{{ $max }}"></span>
        </div>
    </div>
</x-plume::form.element>
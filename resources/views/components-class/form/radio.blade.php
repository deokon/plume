{{--
@component x-plume::form.radio
--}}
<x-plume::form.element :name="$name" :id="$id" :model="$model">
    <div class="flex items-center gap-3">
        <div class="relative flex items-center justify-center">
            <input type="radio" name="{{ $name }}" id="{{ $id }}"
                value="{{ $value }}" @if ($checked) checked @endif
                @if ($model) x-model="{{ $model }}" @endif
                {{ $attributes->merge(['class' => 'peer size-5 shrink-0 appearance-none rounded-full border-2 border-background-700/40 bg-background transition-all checked:bg-primary checked:border-primary focus:outline-none focus:ring-2 focus:ring-primary/50 disabled:opacity-50 dark:border-background-400/20 dark:bg-background-800']) }}>
            <div
                class="absolute size-2 rounded-full bg-primary-foreground opacity-0 transition-opacity peer-checked:opacity-100 pointer-events-none">
            </div>
        </div>
        @if ($label)
            <label for="{{ $id }}"
                class="text-sm font-medium text-foreground cursor-pointer select-none">
                {{ $label }}
            </label>
        @endif
    </div>
</x-plume::form.element>
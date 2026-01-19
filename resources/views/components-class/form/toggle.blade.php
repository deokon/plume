{{--
@component x-plume::form.toggle
--}}
<x-plume::form.element :name="$name" :id="$id" :model="$model">
    <div class="flex items-center gap-3">
        <button type="button" @click="{{ $model }} = !{{ $model }}"
            class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 bg-background-200 dark:bg-background-700"
            role="switch" :aria-checked="{{ $model }}"
            :class="{ 'bg-primary': {{ $model }} }">
            <span aria-hidden="true"
                class="pointer-events-none inline-block size-5 transform rounded-full bg-background shadow ring-0 transition duration-200 ease-in-out"
                :class="{ 'translate-x-5': {{ $model }}, 'translate-x-0': !{{ $model }} }"></span>
        </button>
        @if ($label)
            <span class="text-sm font-medium text-foreground cursor-pointer select-none"
                @click="{{ $model }} = !{{ $model }}">
                {{ $label }}
            </span>
        @endif
    </div>
</x-plume::form.element>
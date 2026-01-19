{{--
@component x-plume::progress
@description A bar that shows the completion progress of a task.
--}}
<div
    {{ $attributes->merge(['class' => 'relative h-4 w-full overflow-hidden rounded-full bg-secondary/20 dark:bg-background-700']) }}>
    <div class="h-full w-full flex-1 transition-all {{ $styleClass }}"
        style="transform: translateX(-{{ 100 - $value }}%)"></div>
    {{ $slot }}
</div>
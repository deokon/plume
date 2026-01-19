{{--
@component x-plume::progress.percent
@description Display the percentage value inside or near a progress bar.
--}}
<div {{ $attributes->merge(['class' => 'absolute inset-0 flex items-center justify-center text-[10px] font-bold text-foreground mix-blend-difference']) }}>
    {{ $value }}%
</div>
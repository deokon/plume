{{--
@component x-plume::progress.percent
@description Display the percentage value inside or near a progress bar.
--}}
<div x-data="{ 
        innerVal: typeof val !== 'undefined' ? val : {{ $component->value ?? 0 }},
        @if($component->model) init() { this.$watch('{{ $component->model }}', value => this.innerVal = value) } @endif
    }"
    @if($component->model === null) x-init="if (typeof val !== 'undefined') $watch('val', value => innerVal = value)" @endif
    {{ $attributes->merge(['class' => 'flex items-center justify-center text-[10px] font-bold text-foreground mix-blend-difference']) }}
    :class="typeof val !== 'undefined' ? 'absolute inset-0' : 'relative w-full h-full p-2'">
    <span x-text="typeof percent !== 'undefined' ? percent : innerVal"></span>%
</div>

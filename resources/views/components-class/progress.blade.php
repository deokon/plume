{{--
@component x-plume::progress
@description A bar that shows the completion progress of a task.
--}}
<div x-data="{ 
        _val: {{ $value }}, 
        _maxVal: {{ $max }},
        get _percent() { return Math.round((this._val / this._maxVal) * 100) }
    }"
    @if($model) x-init="$watch('{{ $model }}', value => _val = value)" @endif
    {{ $attributes->merge(['class' => 'w-full space-y-2']) }}>
    
    @if ($title || ($display && !in_array($display, ['none', 'inside'])))
        <div class="flex w-full items-center justify-between gap-4">
            @if ($title)
                <span class="text-sm font-medium text-foreground/70 dark:text-background-400">{{ $title }}</span>
            @endif
            
            @if ($display && !in_array($display, ['none', 'inside']))
                <span class="text-xs font-semibold text-foreground/50 dark:text-background-500">
                    @if ($display === 'percentage')
                        <span x-text="_percent"></span>%
                    @elseif ($display === 'number')
                        <span x-text="_val"></span>
                    @elseif ($display === 'outof')
                        <span x-text="_val"></span> / <span x-text="_maxVal"></span>
                    @endif
                </span>
            @endif
        </div>
    @endif

    <div class="relative h-4 w-full overflow-hidden rounded-full bg-secondary/20 dark:bg-background-700">
        <div class="h-full transition-all {{ $styleClass }}"
            :style="'width: ' + _percent + '%; min-width: 2px;'"></div>
        
        @if($display === 'inside')
            <div class="absolute inset-0 flex items-center justify-center text-[10px] font-bold text-foreground mix-blend-difference pointer-events-none">
                <span x-text="_percent"></span>%
            </div>
        @endif

        {{ $slot }}
    </div>
</div>

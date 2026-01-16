{{--
@component x-plume::chart
@description Basic chart component for data visualization (bar, line).
--}}
@props([
    'type' => 'bar', // bar, line
    'data' => [], // Array of numbers or {label, value}
    'height' => 200,
    'color' => 'text-primary',
])

<div 
    x-data="{
        data: {{ json_encode($data) }},
        type: '{{ $type }}',
        height: {{ $height }},
        
        get max() {
            if (!this.data.length) return 0;
            return Math.max(...this.values);
        },
        
        get values() {
            return this.data.map(d => typeof d === 'object' ? d.value : d);
        },
        
        get labels() {
             return this.data.map(d => typeof d === 'object' ? d.label : '');
        },
        
        get points() {
            if (!this.data.length) return '';
            const step = 100 / (this.data.length - 1);
            return this.values.map((val, i) => {
                const x = i * step;
                const y = 100 - ((val / this.max) * 100);
                return `${x},${y}`;
            }).join(' ');
        }
    }"
    class="w-full"
>
    <div class="relative w-full" :style="`height: ${height}px`">
        {{-- Y-Axis Lines --}}
        <div class="absolute inset-0 flex flex-col justify-between text-xs text-foreground/40 pointer-events-none">
            <div class="border-b border-background-700/20 dark:border-background-400/10 w-full h-0"></div>
            <div class="border-b border-background-700/20 dark:border-background-400/10 w-full h-0"></div>
            <div class="border-b border-background-700/20 dark:border-background-400/10 w-full h-0"></div>
            <div class="border-b border-background-700/20 dark:border-background-400/10 w-full h-0"></div>
            <div class="border-b border-background-700/40 dark:border-background-400/20 w-full h-0"></div>
        </div>
        
        {{-- Chart --}}
        <svg class="w-full h-full overflow-visible" preserveAspectRatio="none" viewBox="0 0 100 100">
             {{-- Bar Chart --}}
            <template x-if="type === 'bar'">
                <g class="{{ $color }}">
                    <template x-for="(val, index) in values">
                        <rect 
                            :x="index * (100 / values.length) + (100 / values.length * 0.1)" 
                            :y="100 - ((val / max) * 100)" 
                            :width="(100 / values.length) * 0.8" 
                            :height="((val / max) * 100)" 
                            fill="currentColor"
                            class="hover:opacity-80 transition-opacity"
                        >
                             <title x-text="labels[index] + ': ' + val"></title>
                        </rect>
                    </template>
                </g>
            </template>
            
            {{-- Line Chart --}}
            <template x-if="type === 'line'">
                <g class="{{ $color }}">
                    <polyline 
                        :points="points" 
                        fill="none" 
                        stroke="currentColor" 
                        stroke-width="2" 
                        vector-effect="non-scaling-stroke"
                    />
                    {{-- Dots --}}
                     <template x-for="(val, i) in values">
                        <circle 
                            :cx="i * (100 / (values.length - 1))" 
                            :cy="100 - ((val / max) * 100)" 
                            r="3" 
                            fill="currentColor"
                            vector-effect="non-scaling-stroke"
                            class="hover:scale-150 transition-transform origin-center cursor-pointer"
                        >
                            <title x-text="labels[i] + ': ' + val"></title>
                        </circle>
                    </template>
                </g>
            </template>
        </svg>
    </div>
    
    {{-- X-Axis Labels --}}
    <div class="flex justify-between mt-2 text-xs text-foreground/50">
         <template x-for="label in labels">
            <span x-text="label" class="truncate px-1" :style="`width: ${100/data.length}%`"></span>
        </template>
    </div>
</div>

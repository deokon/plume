{{--
@component x-plume::chart
@description Basic chart component for data visualization (bar, line).
@prop string $type (Default: 'bar')
@prop array $data (Default: [])
@prop int $height (Default: 200)
@prop string $color (Default: 'text-primary')
--}}
<div class="w-full">
    <div class="relative w-full" style="height: {{ $height }}px">
        {{-- Y-Axis Lines --}}
        <div
            class="absolute inset-0 flex flex-col justify-between text-xs text-foreground/40 dark:text-background-400/60 pointer-events-none">
            <div class="border-b border-background-700/20 dark:border-background-400/10 w-full h-0">
            </div>
            <div class="border-b border-background-700/20 dark:border-background-400/10 w-full h-0">
            </div>
            <div class="border-b border-background-700/20 dark:border-background-400/10 w-full h-0">
            </div>
            <div class="border-b border-background-700/20 dark:border-background-400/10 w-full h-0">
            </div>
            <div class="border-b border-background-700/40 dark:border-background-400/20 w-full h-0">
            </div>
        </div>

        {{-- Chart --}}
        <svg class="w-full h-full overflow-visible" preserveAspectRatio="none" viewBox="0 0 100 100"
            xmlns="http://www.w3.org/2000/svg">
            {{-- Bar Chart --}}
            @if ($type === 'bar' && $count > 0)
                <g class="{{ $color }}">
                    @foreach ($values as $index => $val)
                        @php
                            $barWidth = (100 / $count) * 0.8;
                            $x = $index * (100 / $count) + (100 / $count) * 0.1;
                            $h = $max > 0 ? ($val / $max) * 100 : 0;
                            $y = 100 - $h;
                        @endphp
                        <rect x="{{ $x }}" y="{{ $y }}"
                            width="{{ $barWidth }}" height="{{ $h }}"
                            fill="currentColor" class="hover:opacity-80 transition-opacity">
                            <title>{{ ($labels[$index] ?? '') . ': ' . $val }}</title>
                        </rect>
                    @endforeach
                </g>
            @endif

            {{-- Line Chart --}}
            @if ($type === 'line' && $count > 0)
                @php
                    $points = '';
                    if ($count > 1 && $max > 0) {
                        $step = 100 / ($count - 1);
                        foreach ($values as $i => $val) {
                            $px = $i * $step;
                            $py = 100 - ($val / $max) * 100;
                            $points .= "$px,$py ";
                        }
                    }
                @endphp
                <g class="{{ $color }}">
                    @if ($points)
                        <polyline points="{{ trim($points) }}" fill="none" stroke="currentColor"
                            stroke-width="2" vector-effect="non-scaling-stroke" />
                    @endif
                    {{-- Dots --}}
                    @foreach ($values as $i => $val)
                        @php
                            $cx = $count > 1 ? $i * (100 / ($count - 1)) : 50;
                            $cy = $max > 0 ? 100 - ($val / $max) * 100 : 100;
                        @endphp
                        <circle cx="{{ $cx }}" cy="{{ $cy }}" r="3"
                            fill="currentColor" vector-effect="non-scaling-stroke"
                            class="hover:scale-150 transition-transform origin-center cursor-pointer">
                            <title>{{ ($labels[$i] ?? '') . ': ' . $val }}</title>
                        </circle>
                    @endforeach
                </g>
            @endif
        </svg>
    </div>

    {{-- X-Axis Labels --}}
    @if ($count > 0)
        <div class="flex justify-between mt-2 text-xs text-foreground/50 dark:text-background-400">
            @foreach ($labels as $label)
                <span class="truncate px-1 text-center"
                    style="width: {{ 100 / $count }}%">{{ $label }}</span>
            @endforeach
        </div>
    @endif
</div>
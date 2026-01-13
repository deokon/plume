@props([
    'href' => null,
    'icon' => null,
    'fullWidth' => false,
    ])
@aware([
    'size' => 'md',
    'style' => null,
    'shape' => 'default',
])

@php
$sizeClass = match($size) {
    'sm' => 'text-sm font-medium gap-1.5 px-3 has-[>svg]:px-2.5 has-[>.icon]:px-2.5 py-1.5',
    'lg' => 'text-xl font-medium gap-2.5 px-5 has-[>svg]:px-4 has-[>.icon]:px-4 py-3',
    // 'md'
    default => 'text-base font-medium gap-2 px-4 has-[>svg]:px-3 has-[>.icon]:px-3 py-2.5'
};

$styleClass = match($style) {
    'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary-300 dark:hover:bg-secondary/80',
    'destructive' => 'bg-destructive text-destructive-foreground hover:bg-destructive-800 dark:hover:bg-destructive/80',
    'outline' => 'border bg-none shadow-xs hover:bg-primary/20 hover:text-foreground dark:hover:bg-background-700 dark:hover:text-background-200',
    'ghost' => 'hover:bg-primary/20 hover:text-foreground dark:hover:bg-background-700 dark:hover:text-background-200',
    'link' => 'underline-offset-4 hover:underline text-primary',
    // 'default'
    default => 'bg-primary text-primary-foreground hover:bg-primary-800 dark:hover:bg-primary/80',
};

$shapeClass = match($shape) {
    'pill' => 'rounded-full',
    'round' => 'rounded-full aspect-square p-0',
    // 'default'
    default => 'rounded-md',
};

$class = ($attributes->get('class') ?? '')
    .' inline-flex items-center justify-center whitespace-nowrap transition-all shrink-0'
    .' outline-none focus-visible:border-primary focus-visible:ring-primary/50 focus-visible:ring-[3px] dark:focus-visible:border-primary-200 dark:focus-visible:ring-primary-200/50'
    .' hover:cursor-pointer active:scale-95'
    .' disabled:pointer-events-none disabled:opacity-70 disabled:cursor-default disabled:saturate-30'
    // .' [&_svg]:pointer-events-none [&_svg:not([class*=\\\'size-\\\'])]:size-4 [&_svg]:shrink-0'
    .' [&_span.icon]:pointer-events-none [&_span.icon:not([class*=\\\'size-\\\'])]:size-8 [&_span.icon]:shrink-0'
    .' aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive'
    . ($fullWidth ? ' w-full' : '')
    ;
@endphp

@if($href === null)
<button
    type="button"
    {{ $attributes->merge(['class' => $class . ' ' . $sizeClass . ' ' . $styleClass . ' ' . $shapeClass]) }}
>
@if($icon)
    <x-plume::icon i="{{ $icon }}" />
@endif
    {{ $slot }}
</button>
@else
<a
    href="{{ $href ?? '#' }}"
    {{ $attributes->merge(['class' => $class . ' ' . $sizeClass . ' ' . $styleClass]) }}
>
@if($icon)
    <x-plume::icon i="{{ $icon }}" />
@endif
    {{ $slot }}
</a>
@endif

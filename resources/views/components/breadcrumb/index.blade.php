{{--
@component x-plume::breadcrumb
@description Displays the path to the current resource using a hierarchy of links.
--}}
<nav {{ $attributes->merge(['aria-label' => 'Breadcrumb']) }}>
    <ol
        class="flex flex-wrap items-center gap-1.5 break-words text-sm text-foreground/50 dark:text-background-400 sm:gap-2.5">
        {{ $slot }}
    </ol>
</nav>

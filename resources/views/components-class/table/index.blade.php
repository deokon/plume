{{--
@component x-plume::table
@description A responsive table component.
--}}
<div class="relative w-full overflow-auto {{ $stickyHeader ? 'max-h-[500px]' : '' }}">
    <table
        {{ $attributes->merge([
            'class' =>
                'w-full caption-bottom text-sm border-separate border-spacing-0 ' .
                $densityClasses .
                ($hoverable
                    ? ' [&_tbody_tr:hover]:bg-background-200/50 dark:[&_tbody_tr:hover]:bg-background-700/50'
                    : '') .
                ($striped
                    ? ' [&_tbody_tr:nth-child(even)]:bg-background-100/50 dark:[&_tbody_tr:nth-child(even)]:bg-background-800/50'
                    : ''),
        ]) }}>
        {{ $slot }}
    </table>
</div>
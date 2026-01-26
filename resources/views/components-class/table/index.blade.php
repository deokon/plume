{{--
@component x-plume::table
@description A standard HTML table with semantic styling and responsive overflow support.
@prop bool $striped (Default: false) Whether to alternate row colors.
@prop bool $hoverable (Default: false) Whether to highlight rows on hover.
@prop bool $stickyHeader (Default: false) Whether to keep the header visible when scrolling.
@prop string $density (Default: 'default') Spacing density: 'compact', 'default', 'loose'.
@usage
<x-plume::table striped hoverable>
    <x-plume::table.thead>
        <x-plume::table.tr>
            <x-plume::table.th>Name</x-plume::table.th>
            <x-plume::table.th>Email</x-plume::table.th>
        </x-plume::table.tr>
    </x-plume::table.thead>
    <x-plume::table.tbody>
        <x-plume::table.tr>
            <x-plume::table.td>John Doe</x-plume::table.td>
            <x-plume::table.td>john@example.com</x-plume::table.td>
        </x-plume::table.tr>
    </x-plume::table.tbody>
</x-plume::table>
--}}
<div class="relative w-full overflow-auto {{ $stickyHeader ? 'max-h-[500px]' : '' }}">
    <table
        {{ $attributes->merge([
            'class' =>
                'w-full caption-bottom text-sm ' .
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

{{--
@component x-plume::table.tr
@description Table row.
@prop string $rowAlign (Default: null) Vertical alignment of cells in the row (top, middle, bottom).
@prop string $align (Default: null) Horizontal alignment of cells in the row (left, center, right).
--}}
<tr
    {{ $attributes->merge(['class' => 'border-b border-background-700/40 data-[state=selected]:bg-background-600 dark:border-background-400/40 dark:data-[state=selected]:bg-background-700']) }}>
    {{ $slot }}
</tr>

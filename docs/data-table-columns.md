# Data Table Columns

Customizing how data is displayed in your table cells.

## Constructed Columns

Constructed columns allow you to combine multiple fields or wrap data in HTML using simple placeholders. Use `{key}` to reference any property in your row object.

```blade
@php
$columns = [
    [\'key\' => \'name\', \'label\' => \'Name\'],
    [\'key\' => \'profile\', \'label\' => \'Profile\', \'constructed\' => \'<a href="/users/{id}">{name}</a>\'],
];
@endphp

<x-plume::data-table :data="$users" :columns="$columns" />
```

## Slot-based Columns

For more complex rendering that requires full Blade power, use slot-based columns. Reference a named slot using `{slot:name}` in your column definition.

```blade
@php
$columns = [
    [\'key\' => \'name\', \'label\' => \'Name\'],
    [\'key\' => \'actions\', \'label\' => \'Actions\', \'constructed\' => \'{slot:actions}\	old'],
];
@endphp

<x-plume::data-table :data="$users" :columns="$columns">
    <x-slot:actions>
        <x-plume::button size="xs">Edit</x-plume::button>
    </x-slot:actions>
</x-plume::data-table>
```

```
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

## Choosing an Approach



### Constructed Columns

**Best for:** Simple HTML wrapping, concatenation, or conditional classes based on row values.

- **Pros:** Extremely fast (handled entirely in JS), easy to define in PHP arrays.

- **Cons:** Limited to basic string replacement, no access to Blade directives or complex PHP logic.



### Slot-based Columns

**Best for:** Complex UI components (like Buttons, Avatars, or nested Forms) that require Blade logic.

- **Pros:** Full power of Blade, access to component helpers, easier to read for complex layouts.

- **Cons:** Slightly more overhead as the slot content is rendered once and passed to the component.



### Mixing Approaches

You can mix both in the same table. For example, use constructed columns for simple links and slots for complex action menus.



## Performance Considerations

For very large tables (hundreds of rows), **Constructed Columns** are significantly more performant as they avoid the overhead of Blade rendering for every cell. However, for standard paginated views (10-50 rows), the difference is negligible, and you should choose based on developer convenience and code clarity.



```
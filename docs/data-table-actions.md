# Data Table Actions

Interacting with table rows and refreshing data.

## Row Actions

Buttons with a `method` prop automatically use AJAX for submission. You can place these within slot-based columns to provide per-row actions.

## AJAX Callbacks

Combine AJAX actions with `onSuccess` to provide feedback and refresh the table data by calling the component's `fetch()` method.

```blade
<x-plume::button 
    method="DELETE" 
    :href="route('users.destroy', $row['id'])"
    confirm="Are you sure?"
    onSuccess="fetch()"
>
    Delete
</x-plume::button>
```


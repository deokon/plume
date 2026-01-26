# Search

Styled search input with an integrated results dropdown.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `placeholder` | `string` | `'Search...'` | Placeholder text for the search input. |
| `model` | `string` | `null` | AlpineJS model name for the search query. |
| `onSelect` | `string` | `null` | AlpineJS expression or function to call when a result is selected. |

## Usage

```blade
<x-plume::search model="searchQuery" placeholder="Find users...">
    <x-slot:results>
        <template x-for="user in filteredUsers">
            <x-plume::search.result 
                ::title="user.name" 
                ::href="'/users/' + user.id" 
                ::payload="user"
            />
        </template>
    </x-slot:results>
</x-plume::search>
```

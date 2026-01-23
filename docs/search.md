# Search

Styled search input with an integrated results dropdown.

## Overview

The Search component provides a unified interface for data filtering or site-wide search results.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `placeholder` | `string` | `'Search...'` | Input placeholder. |
| `model` | `string` | `null` | AlpineJS model name for the query. |

## Usage

### Simple Search

```blade
<div x-data="{ query: '' }">
    <x-plume::search model="query">
        <template x-if="query.length > 2">
            <div class="p-2">
                <x-plume::search.result title="Example Result" href="/item/1" icon="icon-[fluent--document-24-regular]" />
            </div>
        </template>
    </x-plume::search>
</div>
```

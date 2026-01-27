# Form Group

Groups related form inputs (like radios or checkboxes) under a single label.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Label for the group of inputs. |
| `description` | `string` | `null` | Help text for the group. |
| `minCols` | `int` | `1` | Grid columns for the inner inputs. |
| `model` | `string` | `null` | Shared AlpineJS model name for child inputs. |
| `name` | `string` | `null` | Shared name attribute for child inputs. |

## Usage

### Grouping Checkboxes
The `model` prop on the group will be automatically shared with all child inputs, ideal for binding multiple values to an array:
```blade
<x-plume::form.group label="Interests" model="interests" description="Select all that apply">
    <x-plume::form.checkbox value="tech" label="Technology" />
    <x-plume::form.checkbox value="design" label="Design" />
    <x-plume::form.checkbox value="marketing" label="Marketing" />
</x-plume::form.group>
```

### Grid Layout
Use `minCols` to arrange children in a responsive grid:
```blade
<x-plume::form.group label="Options" :minCols="2">
    <x-plume::form.radio value="1" label="Option 1" />
    <x-plume::form.radio value="2" label="Option 2" />
</x-plume::form.group>
```

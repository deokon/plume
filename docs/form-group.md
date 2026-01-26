# Form Group

Groups related form inputs (like radios or checkboxes) under a single label.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Label for the group of inputs. |
| `description` | `string` | `null` | Help text for the group. |
| `minCols` | `int` | `1` | Grid columns for the inner inputs. |
| `name` | `string` | `null` | Shared name attribute for child inputs. |
| `model` | `string` | `null` | Shared AlpineJS model name for child inputs. |

## Usage

```blade
<x-plume::form.group label="Notification Preferences" model="prefs">
    <x-plume::form.checkbox value="email" label="Email" />
    <x-plume::form.checkbox value="sms" label="SMS" />
</x-plume::form.group>
```

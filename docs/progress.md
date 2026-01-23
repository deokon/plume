# Progress

A bar that shows the completion progress of a task.

## Overview

The Progress component visualizes how much of a process or task has been completed.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `value` | `number` | `0` | Current value. |
| `max` | `number` | `100` | Maximum value. |
| `style` | `string` | `'default'` | Style variant: `default`, `success`, `warning`, `destructive`. |
| `title` | `string` | `null` | Optional label above the bar. |
| `display` | `string` | `'percentage'` | Text label: `none`, `percentage`, `fraction`. |

## Usage

### Styles

```blade
<x-plume::progress :value="75" title="Uploading File" />
<x-plume::progress :value="40" style="warning" display="fraction" :max="10" title="Steps" />
<x-plume::progress :value="100" style="success" title="Complete" />
```

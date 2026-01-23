# Time Picker

A simple time selection input.

## Overview

The Time Picker component allows users to select a time using the native browser interface, styled to match the Plume design system.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Header label text. |
| `name` | `string` | `null` | HTML name attribute. |
| `model` | `string` | `null` | AlpineJS model name. |
| `placeholder` | `string` | `''` | Input placeholder. |

## Usage

### Basic Usage

```blade
<x-plume::form.time 
    label="Meeting Time" 
    model="meetingTime" 
    name="start_time" 
/>
```

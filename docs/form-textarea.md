# Textarea

A multi-line text input.

## Overview

Textareas are used for larger amounts of text input, such as comments, descriptions, or messages.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Header label text. |
| `name` | `string` | `null` | HTML name attribute. |
| `model` | `string` | `null` | AlpineJS model name. |
| `rows` | `number` | `3` | Initial number of lines. |
| `placeholder` | `string` | `''` | Input placeholder. |

## Usage

### Basic Usage

```blade
<x-plume::form.textarea 
    label="Biography" 
    model="bio" 
    placeholder="Tell us about yourself..." 
    :rows="5"
/>
```

# File Upload

A file upload input with drag-and-drop support.

## Overview

The File Upload component provides a styled area for users to select or drag and drop files for upload.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Header label text. |
| `name` | `string` | `null` | HTML name attribute. |
| `model` | `string` | `null` | AlpineJS model name. |
| `multiple` | `boolean` | `false` | Whether to allow multiple file selection. |

## Usage

### Basic Usage

```blade
<x-plume::form.file 
    label="Resume (PDF)" 
    model="resume" 
    name="resume_file" 
/>
```

### Multiple Files

```blade
<x-plume::form.file 
    label="Gallery Images" 
    model="images" 
    name="photos" 
    multiple 
/>
```

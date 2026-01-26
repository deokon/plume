# Form File

A file upload input with drag-and-drop support and automatic pre-uploading.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label for the file input. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated if not provided. |
| `model` | `string` | `null` | AlpineJS model name. Stores the uploaded file ID(s). |
| `multiple` | `bool` | `false` | Allow selecting and uploading multiple files. |
| `accept` | `string` | `null` | Accepted file types (e.g., 'image/*', '.pdf'). |
| `uploadUrl` | `string` | `null` | API endpoint for immediate pre-upload. If provided, files are uploaded as soon as they are selected. |

## Usage

```blade
Basic Usage (Standard Form Submit):
<x-plume::form.file label="Resume" name="resume" accept=".pdf,.doc" />

Immediate AJAX Pre-upload (Recommended):
The server must return JSON like: {"id": "file_uuid"}
<x-plume::form.file 
    label="Gallery" 
    model="images" 
    multiple 
    :uploadUrl="route('api.upload')" 
    accept="image/*" 
/>

When using uploadUrl, the 'images' model in formData will be updated 
automatically with the IDs returned from the server.
```

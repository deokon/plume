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

### Basic Usage
```blade
<x-plume::form.file label="Resume" name="resume" accept=".pdf,.doc" />
```

### Immediate AJAX Pre-upload (Recommended)
The server must return JSON like: `{"id": "file_uuid"}`. The 'images' model in formData will be updated automatically with the IDs returned from the server.
```blade
<x-plume::form.file 
    label="Gallery" 
    model="images" 
    multiple 
    :uploadUrl="route('api.upload')" 
    accept="image/*" 
/>
```

### Image Upload with Preview
Combine `uploadUrl` with a simple AlpineJS template to show previews:
```blade
<div x-data="{ previews: [] }">
    <x-plume::form.file 
        label="Avatar" 
        model="avatar_id" 
        accept="image/*"
        :uploadUrl="route('api.upload')"
        onSuccess="previews.push($event.detail.preview_url)"
    />

    <template x-if="previews.length">
        <div class="mt-4 flex gap-4">
            <template x-for="url in previews">
                <img :src="url" class="size-20 rounded-lg object-cover border" />
            </template>
        </div>
    </template>
</div>
```

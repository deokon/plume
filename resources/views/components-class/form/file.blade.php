{{--
@component x-plume::form.file
@description A file upload input with drag-and-drop support and automatic pre-uploading.
@prop string $label (Default: null) The label for the file input.
@prop string $name (Default: null) HTML name attribute.
@prop string $id (Default: null) HTML id attribute. Auto-generated if not provided.
@prop string $model (Default: null) AlpineJS model name. Stores the uploaded file ID(s).
@prop bool $multiple (Default: false) Allow selecting and uploading multiple files.
@prop string $accept (Default: null) Accepted file types (e.g., 'image/*', '.pdf').
@prop string $uploadUrl (Default: null) API endpoint for immediate pre-upload. If provided, files are uploaded as soon as they are selected.
@usage
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
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $fileInput = $component;
    [$resolvedName, $resolvedModel, $resolvedId] = $fileInput->resolveFormAttributes(
        $attributes->all(),
        $groupName,
        $groupModel,
    );
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <div x-data="fileInput('{{ $resolvedModel }}', {{ Js::from($uploadUrl) }})"
        class="relative flex min-h-[150px] cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed transition-all"
        :class="isDropping ? 'border-primary bg-primary/5' :
            'border-background-700/40 bg-background-50 dark:border-background-400/20 dark:bg-background-800'"
        x-on:dragover.prevent="isDropping = true" x-on:dragleave.prevent="isDropping = false"
        x-on:drop.prevent="handleDrop($event)" x-on:click="$refs.input.click()">

        <input type="file" x-ref="input" name="{{ $resolvedName }}{{ $multiple ? '[]' : '' }}"
            id="{{ $resolvedId }}" @if ($multiple) multiple @endif
            @if ($accept) accept="{{ $accept }}" @endif class="sr-only"
            @if ($resolvedModel) :aria-invalid="hasError('{{ $resolvedModel }}')"
                :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null" @endif
            x-on:change="handleFileSelect($event)">

        <template x-if="files.length === 0">
            <div class="flex flex-col items-center justify-center space-y-2 text-center p-6">
                <div class="rounded-full bg-background-200 p-3 dark:bg-background-700">
                    <x-plume::icon i="icon-[fluent--cloud-arrow-up-24-regular]"
                        class="size-6 text-foreground/60 dark:text-background-400" />
                </div>
                <div class="space-y-1">
                    <p class="text-sm font-medium text-foreground">Click to upload or drag and drop
                    </p>
                    <p class="text-xs text-foreground/50 dark:text-background-400">
                        @if ($accept)
                            Accepted files: {{ $accept }}
                        @else
                            Any file type (max. 10MB)
                        @endif
                    </p>
                </div>
            </div>
        </template>

        <template x-if="files.length > 0">
            <div class="flex flex-wrap items-center justify-center gap-4 p-6 w-full"
                x-on:click.stop>
                <template x-for="(file, index) in files" :key="index">
                    <div class="flex flex-col items-center gap-2 group relative">
                        <div
                            class="relative size-24 rounded-lg overflow-hidden border border-background-700/40 dark:border-background-400/20 bg-background shadow-sm">
                            <template x-if="file.preview">
                                <img :src="file.preview" class="size-full object-cover"
                                    :class="file.progress < 100 ? 'opacity-50 grayscale' : ''">
                            </template>
                            <template x-if="!file.preview">
                                <div
                                    class="flex size-full items-center justify-center bg-background-100 dark:bg-background-900">
                                    <x-plume::icon i="icon-[fluent--document-24-regular]"
                                        class="size-8 text-primary" />
                                </div>
                            </template>

                            <template x-if="uploadUrl && !file.id && !file.error">
                                <div
                                    class="absolute inset-0 flex flex-col items-center justify-center bg-background/60 p-2">
                                    <div
                                        class="w-full bg-background-200 rounded-full h-1.5 mb-1 dark:bg-background-700">
                                        <div class="bg-primary h-1.5 rounded-full transition-all duration-300"
                                            :style="`width: ${file.progress}%`"></div>
                                    </div>
                                    <span class="text-[8px] font-bold text-foreground"
                                        x-text="file.progress < 100 ? `${file.progress}%` : 'Processing...'"></span>
                                </div>
                            </template>

                            <template x-if="file.error">
                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-error/10">
                                    <x-plume::icon i="icon-[fluent--error-circle-24-regular]"
                                        class="size-8 text-error" />
                                </div>
                            </template>

                            <template x-if="file.id">
                                <div class="absolute top-1 right-1">
                                    <x-plume::icon i="icon-[fluent--checkmark-circle-24-filled]"
                                        class="size-4 text-success shadow-sm rounded-full bg-white dark:bg-background-900" />
                                </div>
                            </template>

                            <div x-data="{ hover: false }" x-on:mouseenter="hover = true"
                                x-on:mouseleave="hover = false"
                                class="absolute inset-0 bg-background-950/40 transition-opacity flex items-center justify-center"
                                x-show="hover" x-cloak x-transition>
                                <x-plume::button style="error" size="sm" shape="round"
                                    x-on:click.stop="removeFile(index)">
                                    <x-plume::icon i="icon-[fluent--dismiss-24-regular]"
                                        class="size-4" />
                                </x-plume::button>
                            </div>
                        </div>
                        <p class="w-24 truncate text-[10px] font-medium text-center text-foreground/70 dark:text-background-400"
                            x-text="file.name"></p>
                    </div>
                </template>

                @if ($multiple)
                    <div class="size-24 rounded-lg border-2 border-dashed border-background-700/40 dark:border-background-400/20 flex items-center justify-center hover:border-primary hover:bg-primary/5 transition-colors cursor-pointer"
                        x-on:click="$refs.input.click()">
                        <x-plume::icon i="icon-[fluent--add-24-regular]"
                            class="size-6 text-foreground/40" />
                    </div>
                @endif
            </div>
        </template>
    </div>
</x-plume::form.element>

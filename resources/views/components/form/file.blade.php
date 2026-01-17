{{--
@component x-plume::form.file
@description Input field for file uploads.
--}}
@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'model' => null,
    'helpText' => 'PNG, JPG, GIF up to 10MB',
])
@php
    $name = $name ?? $model;
    $id = $id ?? Str::slug($name, '_');
@endphp

<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
    <div x-data="fileInput()"
        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-background-700/40 dark:border-background-400/20 border-dashed rounded-md"
        x-bind:class="{ 'border-primary bg-primary/10': isDropping }"
        @dragover.prevent="isDropping = true" @dragleave.prevent="isDropping = false"
        @drop.prevent="handleDrop">
        <div class="space-y-1 text-center">
            <x-plume::icon i="icon-[fluent--image-add-24-regular]"
                class="mx-auto h-12 w-12 text-foreground/30 dark:text-background-400" />
            <div class="flex text-sm">
                <label for="{{ $id }}"
                    class="relative cursor-pointer font-medium text-primary hover:text-primary-500 focus-within:outline-none">
                    <span>Upload a file</span>
                    <input id="{{ $id }}" name="{{ $name }}" type="file"
                        class="sr-only" x-ref="input" @change="handleFileSelect">
                </label>
                <p class="pl-1 text-foreground/50 dark:text-background-400">or drag and drop</p>
            </div>
            <p class="text-xs text-foreground/50 dark:text-background-400">{{ $helpText }}</p>

            <template x-if="file">
                <div class="pt-4">
                    <p class="text-sm font-medium" x-text="file.name"></p>
                    <button type="button" @click="removeFile"
                        class="text-sm text-destructive hover:text-destructive-800">Remove</button>
                </div>
            </template>
        </div>
    </div>
</x-plume::form.element>

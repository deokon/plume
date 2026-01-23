{{--
@component x-plume::form.file
@description A file upload input with drag-and-drop support.
@prop string $label (Default: null)
@prop string $name (Default: null)
@prop string $id (Default: null)
@prop string $model (Default: null)
@prop bool $multiple (Default: false)
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    [$resolvedName, $resolvedModel, $resolvedId] = $component->resolveFormAttributes($attributes->all(), $groupName, $groupModel);
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <div x-data="fileInput()"
        class="relative flex min-h-[150px] cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed transition-all"
        :class="isDropping ? 'border-primary bg-primary/5' : 'border-background-700/40 bg-background-50 dark:border-background-400/20 dark:bg-background-800'"
        x-on:dragover.prevent="isDropping = true"
        x-on:dragleave.prevent="isDropping = false"
        x-on:drop.prevent="handleDrop($event)"
        x-on:click="$refs.input.click()">

        <input type="file" x-ref="input" name="{{ $resolvedName }}" id="{{ $resolvedId }}"
            @if ($multiple) multiple @endif class="sr-only"
            @if ($resolvedModel)
                :aria-invalid="hasError('{{ $resolvedModel }}')"
                :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null"
            @endif
            x-on:change="handleFileSelect($event)">

        <template x-if="!file">
            <div class="flex flex-col items-center justify-center space-y-2 text-center p-6">
                <div class="rounded-full bg-background-200 p-3 dark:bg-background-700">
                    <x-plume::icon i="icon-[fluent--cloud-arrow-up-24-regular]"
                        class="size-6 text-foreground/60 dark:text-background-400" />
                </div>
                <div class="space-y-1">
                    <p class="text-sm font-medium text-foreground">Click to upload or drag and drop</p>
                    <p class="text-xs text-foreground/50 dark:text-background-400">Any file type (max. 10MB)
                    </p>
                </div>
            </div>
        </template>

        <template x-if="file">
            <div class="flex flex-col items-center justify-center space-y-4 p-6 w-full">
                <div class="flex items-center gap-3 w-full rounded-lg border border-background-700/40 bg-background p-3 dark:border-background-400/20 dark:bg-background-900">
                    <div class="rounded-md bg-primary/10 p-2 text-primary">
                        <x-plume::icon i="icon-[fluent--document-24-regular]" class="size-5" />
                    </div>
                    <div class="flex-1 overflow-hidden">
                        <p class="truncate text-sm font-medium text-foreground" x-text="file.name"></p>
                        <p class="text-xs text-foreground/50 dark:text-background-400" x-text="(file.size / 1024 / 1024).toFixed(2) + ' MB'"></p>
                    </div>
                    <x-plume::button style="ghost" size="sm" shape="round" x-on:click.stop="removeFile()">
                        <x-plume::icon i="icon-[fluent--dismiss-24-regular]" class="size-4" />
                    </x-plume::button>
                </div>
            </div>
        </template>
    </div>
</x-plume::form.element>
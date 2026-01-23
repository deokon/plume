{{--
@component x-plume::form.file
@description A file upload input with drag-and-drop support.
@prop string $label (Default: null)
@prop string $name (Default: null)
@prop string $id (Default: null)
@prop string $model (Default: null)
@prop bool $multiple (Default: false)
@prop string $accept (Default: null)
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $fileInput = $component;
    [$resolvedName, $resolvedModel, $resolvedId] = $fileInput->resolveFormAttributes($attributes->all(), $groupName, $groupModel);
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <div x-data="fileInput()"
        class="relative flex min-h-[150px] cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed transition-all"
        :class="isDropping ? 'border-primary bg-primary/5' : 'border-background-700/40 bg-background-50 dark:border-background-400/20 dark:bg-background-800'"
        x-on:dragover.prevent="isDropping = true"
        x-on:dragleave.prevent="isDropping = false"
        x-on:drop.prevent="handleDrop($event)"
        x-on:click="$refs.input.click()">

        <input type="file" x-ref="input" name="{{ $resolvedName }}{{ $multiple ? '[]' : '' }}" id="{{ $resolvedId }}"
            @if ($multiple) multiple @endif 
            @if ($accept) accept="{{ $accept }}" @endif
            class="sr-only"
            @if ($resolvedModel)
                :aria-invalid="hasError('{{ $resolvedModel }}')"
                :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null"
            @endif
            x-on:change="handleFileSelect($event)">

        <template x-if="files.length === 0">
            <div class="flex flex-col items-center justify-center space-y-2 text-center p-6">
                <div class="rounded-full bg-background-200 p-3 dark:bg-background-700">
                    <x-plume::icon i="icon-[fluent--cloud-arrow-up-24-regular]"
                        class="size-6 text-foreground/60 dark:text-background-400" />
                </div>
                <div class="space-y-1">
                    <p class="text-sm font-medium text-foreground">Click to upload or drag and drop</p>
                    <p class="text-xs text-foreground/50 dark:text-background-400">
                        @if($accept) 
                            Accepted files: {{ $accept }}
                        @else
                            Any file type (max. 10MB)
                        @endif
                    </p>
                </div>
            </div>
        </template>

        <template x-if="files.length > 0">
            <div class="flex flex-wrap items-center justify-center gap-4 p-6 w-full" x-on:click.stop>
                <template x-for="(file, index) in files" :key="index">
                    <div class="flex flex-col items-center gap-2 group relative">
                        <div class="relative size-24 rounded-lg overflow-hidden border border-background-700/40 dark:border-background-400/20 bg-background shadow-sm">
                            <template x-if="file.preview">
                                <img :src="file.preview" class="size-full object-cover">
                            </template>
                            <template x-if="!file.preview">
                                <div class="flex size-full items-center justify-center bg-background-100 dark:bg-background-900">
                                    <x-plume::icon i="icon-[fluent--document-24-regular]" class="size-8 text-primary" />
                                </div>
                            </template>
                            
                            <div class="absolute inset-0 bg-background-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <x-plume::button style="error" size="sm" shape="round" x-on:click.stop="removeFile(index)">
                                    <x-plume::icon i="icon-[fluent--dismiss-24-regular]" class="size-4" />
                                </x-plume::button>
                            </div>
                        </div>
                        <p class="w-24 truncate text-[10px] font-medium text-center text-foreground/70 dark:text-background-400" x-text="file.name"></p>
                    </div>
                </template>
                
                @if($multiple)
                    <div class="size-24 rounded-lg border-2 border-dashed border-background-700/40 dark:border-background-400/20 flex items-center justify-center hover:border-primary hover:bg-primary/5 transition-colors cursor-pointer"
                        x-on:click="$refs.input.click()">
                        <x-plume::icon i="icon-[fluent--add-24-regular]" class="size-6 text-foreground/40" />
                    </div>
                @endif
            </div>
        </template>
    </div>
</x-plume::form.element>

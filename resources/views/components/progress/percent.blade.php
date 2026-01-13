@props([
    'value' => 0,
    'title' => null,
    'model' => null,
    'style' => 'default',
])

<x-plume::progress 
    :value="$value" 
    max="100" 
    display="percentage" 
    :title="$title" 
    :model="$model" 
    :style="$style"
    {{ $attributes }} 
/>

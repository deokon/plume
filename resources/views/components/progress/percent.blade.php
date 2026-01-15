{{--
@component x-plume::progress.percent
@prop {number} value -  (Default: 0)
@prop {null} title -  (Default: null)
@prop {null} model -  (Default: null)
@prop {string} style -  (Default: default)
--}}
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

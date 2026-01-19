<?php

namespace deokon\Plume\View\Components\Form\Concerns;

use Illuminate\Support\Str;

trait ResolvesId
{
    public function resolveId(?string $name, ?string $model, ?string $id, ?string $value = null): string
    {
        if ($id) return $id;
        
        $base = $name ?? $model ?? 'field';
        
        if ($value !== null && $value !== '') {
            $base .= '_' . $value;
        }

        return Str::slug($base, '_');
    }
}
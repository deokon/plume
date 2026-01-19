<?php

namespace deokon\Plume\View\Components\Form\Concerns;

use Illuminate\Support\Str;

trait ResolvesId
{
    protected function resolveId(?string $name, ?string $model, ?string $id): string
    {
        if ($id) return $id;
        return Str::slug($name ?? $model ?? 'field', '_');
    }
}

<?php

namespace deokon\Plume;

use Illuminate\Support\Str;

class Form
{
    public static function resolveId(?string $name, ?string $model, ?string $id): string
    {
        if ($id) return $id;
        return Str::slug($name ?? $model ?? 'field', '_');
    }

    public static function inputClasses(?string $icon = null, bool $hasRightSide = false): string
    {
        $base = 'block w-full px-3 py-2 border rounded-md shadow-sm placeholder-foreground/50 dark:placeholder-background-400 border-background-700/40 dark:border-background-400/20 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-background-50 dark:bg-background-700 transition-colors';
        
        if ($icon) {
            $base .= ' pl-10';
        }
        
        if ($hasRightSide) {
            $base .= ' pr-10';
        }

        return $base;
    }
}

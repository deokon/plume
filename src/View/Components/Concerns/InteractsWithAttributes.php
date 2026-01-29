<?php

namespace deokon\Plume\View\Components\Concerns;

use Illuminate\View\ComponentAttributeBag;

trait InteractsWithAttributes
{
    /**
     * Resolve a value from the attribute bag, falling back to a provided value or default.
     * Useful for components that should be "aware" of parent properties.
     */
    public function resolveAttribute(ComponentAttributeBag $attributes, string $key, mixed $awareValue = null, mixed $default = null): mixed
    {
        if ($attributes->has($key)) {
            return $attributes->get($key);
        }

        if (property_exists($this, $key) && $this->{$key} !== null) {
            return $this->{$key};
        }

        return $awareValue ?? $default;
    }

    /**
     * Clean the attribute bag of properties that should not be rendered on the root element.
     */
    public function cleanAttributes(ComponentAttributeBag $attributes, array $except = []): ComponentAttributeBag
    {
        return $attributes->except(array_merge([
            'size', 'style', 'shape', 'variant', 'align', 'side', 'position', 'density'
        ], $except));
    }

    /**
     * Resolve common style props (size, style, shape) from attributes or parent context.
     */
    public function resolveStyleProps(ComponentAttributeBag $attributes, array $aware = []): array
    {
        return [
            $this->resolveAttribute($attributes, 'size', $aware['size'] ?? null, $this->size ?? 'md'),
            $this->resolveAttribute($attributes, 'style', $aware['style'] ?? null, $this->style ?? 'default'),
            $this->resolveAttribute($attributes, 'shape', $aware['shape'] ?? null, $this->shape ?? 'default'),
        ];
    }
}
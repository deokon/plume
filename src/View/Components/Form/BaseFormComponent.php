<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use deokon\Plume\View\Components\Form\Concerns\ResolvesId;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

abstract class BaseFormComponent extends Component
{
    use ResolvesId, InteractsWithAttributes, HasStyles;

    public function __construct(
        public ?string $label = null,
        public ?string $name = null,
        public ?string $id = null,
        public ?string $model = null,
        public ?string $value = '',
        public string $placeholder = '',
    ) {}

    /**
     * Common logic to resolve name, model and unique ID.
     */
    public function resolveFormAttributes(array $attributes, ?string $groupName = null, ?string $groupModel = null): array
    {
        $originalName = $attributes['name'] ?? $this->name;
        $originalModel = $attributes['model'] ?? $this->model;

        $name = $originalName;
        $model = $originalModel;

        // Name resolution
        if ($groupName && $originalName && $originalName !== $groupName) {
            $name = "{$groupName}[{$originalName}]";
        } elseif (!$originalName && $groupName) {
            $name = $groupName;
        }

        // Model resolution
        if ($groupModel && !$originalModel) {
            // Inherit and build path from name if available
            if ($originalName) {
                $model = "{$groupModel}.{$originalName}";
            } else {
                $model = $groupModel;
            }
        }
        
        // If name still empty, derive from model
        if (!$name && $model) {
            $name = str_replace(['data.', 'form.'], '', $model);
            $name = str_replace(['.', '[', ']'], '_', $name);
            $name = rtrim($name, '_');
        }

        // Final fallback for model: if no dots and not starting with data., prefix with data.
        // Skip if we just built it from groupModel (which likely already has prefix)
        if ($model && !str_contains($model, '.') && !str_starts_with($model, 'data.')) {
            $model = 'data.' . $model;
        }

        $id = $attributes['id'] ?? $this->resolveId($name, $model, $this->id, $this->value);

        return [$name, $model, $id];
    }
}

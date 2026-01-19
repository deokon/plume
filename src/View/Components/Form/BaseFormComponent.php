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
    ) {}

    /**
     * Common logic to resolve name, model and unique ID.
     */
    public function resolveFormAttributes(array $attributes, ?string $groupName = null, ?string $groupModel = null): array
    {
        $name = $attributes['name'] ?? $groupName ?? $this->name;
        $model = $attributes['model'] ?? $groupModel ?? $this->model;
        
        // If name wasn't provided, use model as name
        $name = $name ?? $model;

        $id = $attributes['id'] ?? $this->resolveId($name, $model, $this->id, $this->value);

        return [$name, $model, $id];
    }
}
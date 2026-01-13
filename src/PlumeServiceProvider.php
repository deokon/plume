<?php

namespace deokon\Plume;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class PlumeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register the views under a namespace (e.g., <x-plume::button>)
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'plume');

        // Optional: Publish assets so users can modify them
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/plume'),
        ], 'plume-views');

        $this->publishes([
            __DIR__ . '/../resources/css/theme.css' => resource_path('css/vendor/plume/theme.css'),
        ], 'plume-assets');
    }
}


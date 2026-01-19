<?php

namespace deokon\Plume;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class PlumeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register the view namespace
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'plume');

        // Register the component namespace for anonymous components
        Blade::anonymousComponentPath(__DIR__ . '/../resources/views/components', 'plume');
        
        // Register View Classes
        Blade::component('plume::button', \deokon\Plume\View\Components\Button::class);
        Blade::component('plume::alert', \deokon\Plume\View\Components\Alert::class);
        Blade::component('plume::drawer', \deokon\Plume\View\Components\Drawer::class);
        Blade::component('plume::avatar', \deokon\Plume\View\Components\Avatar::class);
        Blade::component('plume::dropdown', \deokon\Plume\View\Components\Dropdown::class);

        // Optional: Publish assets so users can modify them
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/plume'),
        ], 'plume-views');

        $this->publishes([
            __DIR__ . '/../resources/css/theme.css' => resource_path('css/vendor/plume/theme.css'),
            __DIR__ . '/../resources/css/animations.css' => resource_path('css/vendor/plume/animations.css'),
            __DIR__ . '/../resources/css/plume.css' => resource_path('css/vendor/plume/plume.css'),
        ], 'plume-assets');
    }
}


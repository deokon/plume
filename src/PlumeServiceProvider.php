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
        Blade::component('plume::accordion', \deokon\Plume\View\Components\Accordion::class);
        Blade::component('plume::accordion.item', \deokon\Plume\View\Components\AccordionItem::class);
        Blade::component('plume::alert', \deokon\Plume\View\Components\Alert::class);
        Blade::component('plume::alert-dialog', \deokon\Plume\View\Components\AlertDialog::class);
        Blade::component('plume::aspect', \deokon\Plume\View\Components\Aspect::class);
        Blade::component('plume::audio', \deokon\Plume\View\Components\Audio::class);
        Blade::component('plume::avatar', \deokon\Plume\View\Components\Avatar::class);
        Blade::component('plume::badge', \deokon\Plume\View\Components\Badge::class);
        Blade::component('plume::breadcrumb', \deokon\Plume\View\Components\Breadcrumb::class);
        Blade::component('plume::breadcrumb.item', \deokon\Plume\View\Components\BreadcrumbItem::class);
        Blade::component('plume::breadcrumb.separator', \deokon\Plume\View\Components\BreadcrumbSeparator::class);
        Blade::component('plume::button', \deokon\Plume\View\Components\Button::class);
        Blade::component('plume::card', \deokon\Plume\View\Components\Card::class);
        Blade::component('plume::carousel', \deokon\Plume\View\Components\Carousel::class);
        Blade::component('plume::carousel.item', \deokon\Plume\View\Components\CarouselItem::class);
        Blade::component('plume::chart', \deokon\Plume\View\Components\Chart::class);
        Blade::component('plume::command', \deokon\Plume\View\Components\Command::class);
        Blade::component('plume::command.group', \deokon\Plume\View\Components\CommandGroup::class);
        Blade::component('plume::command.item', \deokon\Plume\View\Components\CommandItem::class);
        Blade::component('plume::divider', \deokon\Plume\View\Components\Divider::class);
        Blade::component('plume::drawer', \deokon\Plume\View\Components\Drawer::class);
        Blade::component('plume::dropdown', \deokon\Plume\View\Components\Dropdown::class);
        Blade::component('plume::empty-state', \deokon\Plume\View\Components\EmptyState::class);
        Blade::component('plume::figure', \deokon\Plume\View\Components\Figure::class);
        Blade::component('plume::gallery', \deokon\Plume\View\Components\Gallery::class);
        Blade::component('plume::icon', \deokon\Plume\View\Components\Icon::class);
        Blade::component('plume::kbd', \deokon\Plume\View\Components\Kbd::class);
        Blade::component('plume::modal', \deokon\Plume\View\Components\Modal::class);
        Blade::component('plume::navbar', \deokon\Plume\View\Components\Navbar::class);
        Blade::component('plume::navbar.item', \deokon\Plume\View\Components\NavbarItem::class);
        Blade::component('plume::navbar.logo', \deokon\Plume\View\Components\NavbarLogo::class);
        Blade::component('plume::navbar.menu', \deokon\Plume\View\Components\NavbarMenu::class);
        Blade::component('plume::navbar.mobile-menu', \deokon\Plume\View\Components\NavbarMobileMenu::class);
        Blade::component('plume::navbar.mobile-item', \deokon\Plume\View\Components\NavbarMobileItem::class);
        Blade::component('plume::navbar.mobile-toggle', \deokon\Plume\View\Components\NavbarMobileToggle::class);
        Blade::component('plume::pagination', \deokon\Plume\View\Components\Pagination::class);
        Blade::component('plume::popover', \deokon\Plume\View\Components\Popover::class);
        Blade::component('plume::progress', \deokon\Plume\View\Components\Progress::class);
        Blade::component('plume::progress.percent', \deokon\Plume\View\Components\ProgressPercent::class);
        Blade::component('plume::search', \deokon\Plume\View\Components\Search::class);
        Blade::component('plume::search.result', \deokon\Plume\View\Components\SearchResult::class);
        Blade::component('plume::skeleton', \deokon\Plume\View\Components\Skeleton::class);
        Blade::component('plume::spinner', \deokon\Plume\View\Components\Spinner::class);
        Blade::component('plume::stepper', \deokon\Plume\View\Components\Stepper::class);
        Blade::component('plume::stepper.step', \deokon\Plume\View\Components\StepperStep::class);
        Blade::component('plume::stepper.actions', \deokon\Plume\View\Components\StepperActions::class);
        Blade::component('plume::table', \deokon\Plume\View\Components\Table\Table::class);
        Blade::component('plume::table.thead', \deokon\Plume\View\Components\Table\Thead::class);
        Blade::component('plume::table.tbody', \deokon\Plume\View\Components\Table\Tbody::class);
        Blade::component('plume::table.tr', \deokon\Plume\View\Components\Table\Tr::class);
        Blade::component('plume::table.th', \deokon\Plume\View\Components\Table\Th::class);
        Blade::component('plume::table.td', \deokon\Plume\View\Components\Table\Td::class);
        Blade::component('plume::tabs', \deokon\Plume\View\Components\Tabs\Tabs::class);
        Blade::component('plume::tabs.group', \deokon\Plume\View\Components\Tabs\Group::class);
        Blade::component('plume::tabs.item', \deokon\Plume\View\Components\Tabs\Item::class);
        Blade::component('plume::tabs.panel', \deokon\Plume\View\Components\Tabs\Panel::class);
        Blade::component('plume::toaster', \deokon\Plume\View\Components\Toaster::class);
        Blade::component('plume::tooltip', \deokon\Plume\View\Components\Tooltip::class);
        Blade::component('plume::video', \deokon\Plume\View\Components\Video::class);
        
        // Form Components
        Blade::component('plume::form', \deokon\Plume\View\Components\Form\Form::class);
        Blade::component('plume::form.element', \deokon\Plume\View\Components\Form\Element::class);
        Blade::component('plume::form.input', \deokon\Plume\View\Components\Form\Input::class);
        Blade::component('plume::form.textarea', \deokon\Plume\View\Components\Form\Textarea::class);
        Blade::component('plume::form.select', \deokon\Plume\View\Components\Form\Select::class);
        Blade::component('plume::form.checkbox', \deokon\Plume\View\Components\Form\Checkbox::class);
        Blade::component('plume::form.radio', \deokon\Plume\View\Components\Form\Radio::class);
        Blade::component('plume::form.toggle', \deokon\Plume\View\Components\Form\Toggle::class);
        Blade::component('plume::form.label', \deokon\Plume\View\Components\Form\Label::class);
        Blade::component('plume::form.actions', \deokon\Plume\View\Components\Form\Actions::class);
        Blade::component('plume::form.group', \deokon\Plume\View\Components\Form\Group::class);
        Blade::component('plume::form.inline', \deokon\Plume\View\Components\Form\Inline::class);
        Blade::component('plume::form.section', \deokon\Plume\View\Components\Form\Section::class);
        Blade::component('plume::form.file', \deokon\Plume\View\Components\Form\File::class);
        Blade::component('plume::form.color', \deokon\Plume\View\Components\Form\Color::class);
        Blade::component('plume::form.range', \deokon\Plume\View\Components\Form\Range::class);
        Blade::component('plume::form.combobox', \deokon\Plume\View\Components\Form\Combobox::class);
        Blade::component('plume::form.date', \deokon\Plume\View\Components\Form\Date::class);
        Blade::component('plume::form.datetime', \deokon\Plume\View\Components\Form\Datetime::class);
        Blade::component('plume::form.time', \deokon\Plume\View\Components\Form\Time::class);
        Blade::component('plume::form.number', \deokon\Plume\View\Components\Form\Number::class);
        Blade::component('plume::form.password', \deokon\Plume\View\Components\Form\Password::class);

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
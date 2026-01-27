# Installation

Get up and running with Plume UI in your Laravel project.

## 1. Install via Composer

Add the package to your `composer.json` (using a local path repository if not published) or install it directly:

```bash
composer require deokon/plume
```

## 2. Assets Setup

### Iconify (Required)

This library uses the Fluent icon set via Iconify. Install the required dependencies:

```bash
npm install -D @iconify/tailwind4 @iconify-json/fluent
```

### Tailwind CSS (v4)

Add the Iconify plugin, package views to your Tailwind content scanning, and include the required theme variables in your `app.css`.

#### Option A: Direct Import (Recommended)

Import the theme directly from the vendor directory:

```css
/* resources/css/app.css */
@import "tailwindcss";

@plugin "@iconify/tailwind4" {
  prefix: "icon";
  scale: 1.6;
}

@source "../../vendor/deokon/plume/resources/views/**/*.blade.php";
@source "../../vendor/deokon/plume/src/**/*.php";

@import "../../vendor/deokon/plume/resources/css/plume.css";
```

#### Option B: Publish and Customize

Publish the assets to your project if you want to customize the colors:

```bash
php artisan vendor:publish --tag=plume-assets
```

Then import the required files in your `app.css`. It is recommended to import the animations even if you customize the theme:

```css
/* resources/css/app.css */
@import "./vendor/plume/animations.css";
@import "./vendor/plume/theme.css"; /* Your customized theme */
```

### Alpine.js

Register the provided plugins and data components in your `app.js`:

```javascript
// resources/js/app.js
import Alpine from "alpinejs";
import { 
    modal, 
    drawer, 
    toaster, 
    page, 
    clipboard, 
    form,
    pagination, 
    dataTable, 
    dataGallery,
    calendar,
    carousel,
    combobox,
    command,
    fileInput,
    video,
    accordion,
    accordionItem,
    tabs,
    search,
    stepper
} from "../../vendor/deokon/plume/resources/js";

// Register core plugins
Alpine.plugin(modal);
Alpine.plugin(drawer);
Alpine.plugin(toaster);
Alpine.plugin(page);
Alpine.plugin(clipboard);
Alpine.plugin(form);

// Register data components manually to ensure they are available in expressions
Alpine.data('pagination', pagination);
Alpine.data('dataTable', dataTable);
Alpine.data('dataGallery', dataGallery);
Alpine.data('calendar', calendar);
Alpine.data('carousel', carousel);
Alpine.data('combobox', combobox);
Alpine.data('command', command);
Alpine.data('fileInput', fileInput);
Alpine.data('video', video);
Alpine.data('accordion', accordion);
Alpine.data('accordionItem', accordionItem);
Alpine.data('tabs', tabs);
Alpine.data('search', search);
Alpine.data('stepper', stepper);

window.Alpine = Alpine;
Alpine.start();
```

## 3. Usage

Use components via the `plume` namespace:

```blade
<x-plume::alert style="success" title="Success">
    Your package has been installed!
</x-plume::alert>

<x-plume::button style="primary">
    Confirm Action
</x-plume::button>
```

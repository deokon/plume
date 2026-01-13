# Plume UI

A comprehensive, responsive, and beautiful component library for Laravel, built with Blade, Alpine.js, and Tailwind CSS v4.

## Installation

### 1. Install via Composer

Add the package to your `composer.json` (using a local path repository if not published) or install it directly:

```bash
composer require deokon/plume
```

### 2. Assets Setup

#### Iconify (Required)

This library uses the Fluent icon set via Iconify. Install the required dependencies:

```bash
npm install -D @iconify/tailwind4 @iconify-json/fluent
```

#### Tailwind CSS (v4)

Add the Iconify plugin, package views to your Tailwind content scanning, and include the required theme variables in your `app.css`.

**Option A: Direct Import (Recommended)**
Import the theme directly from the vendor directory:

```css
/* resources/css/app.css */
@import "tailwindcss";

@plugin "@iconify/tailwind4" {
    prefix: "icon";
    scale: 1.6;
}

@source "../../vendor/deokon/plume/resources/views/**/*.blade.php";

@theme {
    @import "../../vendor/deokon/plume/resources/css/theme.css";
}
```

**Option B: Publish and Customize**
Publish the theme file to your project if you want to customize the colors:

```bash
php artisan vendor:publish --tag=plume-assets
```

Then import the published file:

```css
/* resources/css/app.css */
@theme {
    @import "./vendor/plume/theme.css";
}
```

#### Alpine.js

Register the provided plugins in your `app.js`:

```javascript
// resources/js/app.js
import Alpine from "alpinejs";
import { modal, toaster, page, clipboard } from "../../vendor/deokon/plume/resources/js";

Alpine.plugin(modal);
Alpine.plugin(toaster);
Alpine.plugin(page);
Alpine.plugin(clipboard);

window.Alpine = Alpine;
Alpine.start();
```

### 3. Usage

Use components via the `plume` namespace:

```blade
<x-plume::alert style="success" title="Success">
    Your package has been installed!
</x-plume::alert>

<x-plume::button style="primary">
    Confirm Action
</x-plume::button>
```

## Available Components

- Alert
- Avatar
- Badge
- Breadcrumb
- Button (Loader, Toggle, Group)
- Card
- Code
- Drawer
- Dropdown
- Forms (Input, Select, Textarea, Checkbox, Radio, Toggle, etc.)
- Modal
- Pagination
- Progress
- Skeleton
- Spinner
- Table
- Tabs
- Toast
- Tooltip

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

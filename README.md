# Plume UI

A comprehensive, responsive, and beautiful component library for Laravel, built with Blade, Alpine.js, and Tailwind CSS v4.

## Installation

### 1. Install via Composer

Add the package to your `composer.json` (using a local path repository if not published) or install it directly:

```bash
composer require deokon/plume
```

### 2. Assets Setup

#### Tailwind CSS (v4)

Add the package views to your Tailwind content scanning and include the required theme variables in your `app.css`:

```css
/* resources/css/app.css */
@import "tailwindcss";

/* 1. Tell Tailwind to scan the package components */
@source "../../vendor/deokon/plume/resources/views/**/*.blade.php";

/* 2. Include the required theme variables */
@theme {
    /* PRIMARY */
    --color-primary-50: oklch(97% 0.02 260);
    --color-primary-100: oklch(93% 0.05 260);
    --color-primary-200: oklch(88% 0.08 260);
    --color-primary-300: oklch(82% 0.12 260);
    --color-primary-400: oklch(74% 0.16 260);
    --color-primary-500: oklch(65% 0.2 260);
    --color-primary-600: oklch(57% 0.2 260);
    --color-primary-700: oklch(49% 0.18 260);
    --color-primary-800: oklch(42% 0.15 260);
    --color-primary-900: oklch(35% 0.12 260);
    --color-primary-950: oklch(25% 0.1 260);
    --color-primary: var(--color-primary-600);
    --color-primary-foreground: oklch(100% 0 0);

    /* SECONDARY */
    --color-secondary-50: oklch(98% 0.01 260);
    --color-secondary-100: oklch(95% 0.02 260);
    --color-secondary-200: oklch(90% 0.03 260);
    --color-secondary-300: oklch(84% 0.04 260);
    --color-secondary-400: oklch(70% 0.06 260);
    --color-secondary-500: oklch(55% 0.06 260);
    --color-secondary-600: oklch(45% 0.06 260);
    --color-secondary-700: oklch(35% 0.05 260);
    --color-secondary-800: oklch(25% 0.04 260);
    --color-secondary-900: oklch(15% 0.03 260);
    --color-secondary-950: oklch(10% 0.03 260);
    --color-secondary: var(--color-secondary-100);
    --color-secondary-foreground: var(--color-secondary-900);

    /* BACKGROUND / NEUTRAL */
    --color-background-50: oklch(98% 0.005 285);
    --color-background-100: oklch(95% 0.01 285);
    --color-background-200: oklch(90% 0.01 285);
    --color-background-300: oklch(82% 0.02 285);
    --color-background-400: oklch(70% 0.03 285);
    --color-background-500: oklch(55% 0.03 285);
    --color-background-600: oklch(45% 0.03 285);
    --color-background-700: oklch(35% 0.03 285);
    --color-background-800: oklch(25% 0.02 285);
    --color-background-900: oklch(15% 0.02 285);
    --color-background-950: oklch(10% 0.02 285);
    --color-background: var(--color-background-50);
    --color-foreground: var(--color-background-950);

    /* DESTRUCTIVE */
    --color-destructive-50: oklch(98% 0.02 25);
    --color-destructive-100: oklch(95% 0.05 25);
    --color-destructive-200: oklch(90% 0.08 25);
    --color-destructive-300: oklch(82% 0.12 25);
    --color-destructive-400: oklch(72% 0.16 25);
    --color-destructive-500: oklch(63% 0.22 25);
    --color-destructive-600: oklch(55% 0.22 25);
    --color-destructive-700: oklch(48% 0.2 25);
    --color-destructive-800: oklch(38% 0.16 25);
    --color-destructive-900: oklch(28% 0.12 25);
    --color-destructive-950: oklch(20% 0.08 25);
    --color-destructive: var(--color-destructive-600);
    --color-destructive-foreground: oklch(100% 0 0);
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

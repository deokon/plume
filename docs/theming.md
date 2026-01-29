# Theming

Customize the look and feel of your application using Plume's semantic design system and Tailwind CSS v4.

## Overview

Plume is built on top of Tailwind CSS v4 and leverages CSS variables for a highly customizable design system. The theming engine is designed to be **semantic**, meaning you define *what* a color represents (e.g., "Primary", "Background") rather than specific hex values everywhere.

## Global Style Overrides (CSS Variables)

The most efficient way to customize the entire library is by overriding the CSS variables in your project's `@theme` block. This allows you to change the "skin" of every component instantly.

### Color Scales

Plume uses several semantic color scales. You can redefine these in your CSS file after importing Tailwind:

```css
/* resources/css/app.css */
@import "tailwindcss";

@theme {
  /* Change the primary brand color to Indigo */
  --color-primary-50: oklch(96% 0.02 264);
  --color-primary-500: oklch(58% 0.23 268);
  --color-primary-600: oklch(51% 0.23 268);
  --color-primary-950: oklch(18% 0.07 268);
  
  /* Update border radius globally */
  --radius-md: 0px;
  --radius-xl: 4px;
}
```

### Common Semantic Variables
| Variable | Description |
| :--- | :--- |
| `--color-primary-*` | The main brand color scale. |
| `--color-secondary-*` | Muted elements and secondary actions. |
| `--color-background-*` | Page backgrounds, cards, and neutral borders. |
| `--color-error-*` | Destructive actions and error feedback. |

## Component-Level Customization

### Attribute Merging
All Plume components correctly merge a provided `class` attribute with their internal defaults. This allows you to add one-off styling without creating new components.

```blade
<x-plume::button class="shadow-xl ring-4 ring-primary/20">
    Elevated Button
</x-plume::button>
```

### Arbitrary Values
For properties not explicitly exposed as props (like specific positioning or overflow behavior), you can use Tailwind's arbitrary value syntax:

```blade
{{-- Hiding scrollbars on a specific element --}}
<x-plume::carousel class="[scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
    ...
</x-plume::carousel>
```

## Dark Mode

Plume components automatically support dark mode via the `.dark` class on the `<html>` element. The library includes a `page` Alpine component that manages theme persistence using `localStorage` and respects system preferences.

### Using the Page Component
The standard Plume layout uses the `page()` component on the `<html>` element:

```blade
<html x-data="page()">
```

### Toggling Dark Mode
You can toggle the theme using the `toggleColorMode()` method provided by the `page` component:

```blade
<button @click="toggleColorMode()">
    <span x-show="!darkMode">Switch to Dark</span>
    <span x-show="darkMode">Switch to Light</span>
</button>
```

### Customizing Dark Styles
To customize the dark theme colors, redefine your variables within a `.dark` selector in your project's CSS:

```css
.dark {
  --color-background: var(--color-background-950);
  --color-foreground: var(--color-background-50);
}
```

## Using Wrapper Components

If you find yourself applying the same overrides repeatedly, creating a local wrapper component is the recommended approach for maintainability:

```blade
{{-- resources/views/components/brand-button.blade.php --}}
<x-plume::button 
    {{ $attributes->merge(['class' => 'font-bold tracking-widest uppercase']) }}
    style="outline"
    shape="pill"
>
    {{ $slot }}
</x-plume::button>
```
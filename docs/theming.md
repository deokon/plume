# Theming

Customize the look and feel of your application using Plume's semantic design system.

## Overview

Plume is built on top of Tailwind CSS v4 and leverages CSS variables for a highly customizable design system. The theming engine is designed to be **semantic**, meaning you define *what* a color represents (e.g., "Primary", "Destructive") rather than specific hex values everywhere.

## Semantic Colors

The palette is organized into semantic scales: **Primary**, **Secondary**, **Background**, and **Destructive**. To customize your theme, override these variables in your project's CSS (after importing the theme).

### Color Scales

- **Primary**: Used for main actions, active states, and highlights.
- **Secondary**: Used for muted elements, borders, and secondary actions.
- **Background (Neutral)**: Used for page backgrounds, cards, and text colors.
- **Destructive**: Used for error states, deletions, and critical warnings.

### Example Overrides

```css
:root {
  --color-primary-500: #3b82f6;
  --color-primary-600: #2563eb;
  /* ... override other shades as needed ... */
}
```

## Component-Level Customization

### The `class` Attribute
All Plume components accept a standard `class` attribute. Classes passed here are merged with the component's internal styles using the `tailwind-merge` strategy, allowing you to easily override specific utilities.

```blade
<x-plume::button class="bg-indigo-600 hover:bg-indigo-700">
    Custom Color Button
</x-plume::button>
```

### Overriding Defaults
If you find yourself overriding the same component style repeatedly, it is recommended to create a wrapper component in your project:

```blade
{{-- resources/views/components/primary-button.blade.php --}}
<x-plume::button {{ $attributes->merge(['class' => 'rounded-none border-2']) }}>
    {{ $slot }}
</x-plume::button>
```

## Color System Details

Plume's semantic colors are mapped to CSS variables. In Tailwind v4, these are typically defined in your `@theme` block:

```css
@theme {
  --color-primary: var(--color-blue-600);
  --color-primary-foreground: var(--color-white);
  
  --color-background: var(--color-white);
  --color-foreground: var(--color-slate-950);
}
```

### Common Semantic Variables
| Variable | Description |
| :--- | :--- |
| `--color-primary` | The main brand color for actions and active states. |
| `--color-background` | The primary background color for pages and containers. |
| `--color-foreground` | The primary text color. |
| `--color-error` | Used for destructive actions and error feedback. |
| `--color-success` | Used for positive feedback and completion. |

## Dark Mode Deep Dive

Plume components use a combination of semantic color variables and `dark:` utility classes. When `dark` is active on the `<html>` element:

1.  **Variable Swapping:** You should swap your semantic variables (e.g., `--color-background` becomes a dark shade).
2.  **Internal Classes:** Components will automatically apply their `dark:` utilities (e.g., changing border colors from `border-background-200` to `border-background-700`).

### Recommended Dark Theme Block
```css
@media (prefers-color-scheme: dark) {
  :root {
    --color-background: var(--color-slate-950);
    --color-foreground: var(--color-slate-50);
    /* ... swap other semantic colors ... */
  }
}

.dark {
  --color-background: var(--color-slate-950);
  --color-foreground: var(--color-slate-50);
}
```

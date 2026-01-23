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

## Dark Mode

Plume built-in support for dark color schemes using the Tailwind `dark` class strategy. This means you can toggle dark mode by adding or removing the `dark` class on the root `<html>` element.

### Usage

Use the `dark:` prefix to style elements specifically for dark mode.

```blade
<div class="bg-white text-gray-900 dark:bg-gray-900 dark:text-white">
    <p>This card adapts to the theme.</p>
</div>
```

### Implementing a Switcher

You can implement a simple theme switcher using Alpine.js:

```javascript
// Example logic for a theme switcher
x-data="{
    darkMode: localStorage.getItem('theme') === 'dark',
    toggle() {
        this.darkMode = !this.darkMode;
        localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
        document.documentElement.classList.toggle('dark', this.darkMode);
    }
}"
```

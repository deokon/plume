# View Classes Audit

This document identifies Plume components that would benefit from refactoring into dedicated View Classes (Laravel View Components).

## Rationale
Currently, Plume uses "Anonymous Components" (Blade-only files) paired with a static `Theme` helper class. While simple to start, this approach has led to:
1.  **Bloated Blade Files:** `@php` blocks inside templates to calculate classes.
2.  **Tight Coupling:** The `Theme` class contains specific structural knowledge of components (e.g., returning arrays for `Alert` and `Drawer`).
3.  **Untestable Logic:** Style logic is hard to test without rendering the full view.

Refactoring to View Classes (`Deokon\Plume\View\Components\Name`) will encapsulate this logic, allowing for cleaner templates and unit-testable style resolution.

## Candidates

### 1. Button (`x-plume::button`)
**Current State:**
- Heavy usage of `@php` block to concatenate base classes, conditional classes (`fullWidth`, `disabled`), and `Theme::button()` result.
- Logic to switch between `<button>` and `<a>` tags based on `href`.
- Icon handling logic.

**Benefit:**
- A View Class can handle the `tag` resolution (button vs a).
- `classes()` method can cleanly assemble the Tailwind string.
- Easier to add future variants (loading state, different sizes) without cluttering the template.

### 2. Alert (`x-plume::alert`)
**Current State:**
- `Theme::alert()` returns an array (`container`, `icon`, `icon_name`).
- Blade file has to destructure this array.
- Logic for default icon based on style (info, success, etc.).

**Benefit:**
- The View Class can hold the mapping of "Style -> Default Icon".
- Simplifies the `Theme` class by removing the array return requirement; the View Class can request specific parts or handle the composition.

### 3. Drawer (`x-plume::drawer`)
**Current State:**
- `Theme::drawer()` returns an array with `classes` and `transition` directives.
- Complex logic mapping `side` (left, right, top, bottom) to specific Tailwind classes and Alpine transition attributes.

**Benefit:**
- Encapsulate the "Side -> Transition/Class" logic in a PHP method.
- The Blade template becomes significantly cleaner, just outputting attributes provided by the component class.

### 4. Avatar (`x-plume::avatar`)
**Current State:**
- `Theme::avatar()` returns an array for `container` and `status` dot styles.

**Benefit:**
- Similar to Alert, decouples the multi-part styling from the global `Theme` class.

### 5. Dropdown (`x-plume::dropdown`)
**Current State:**
- Logic for `align` (left/right/top) and `width` is in `Theme`.
- The template has to manually apply these.

**Benefit:**
- Logic for positioning and width classes is perfect for a View Class.

## Recommendation
Start with **Button** as a pilot. It is the most used component and has the most "logic" (tag switching, many states). Once the pattern is established, proceed to **Alert** and **Drawer**.

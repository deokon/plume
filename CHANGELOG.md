# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://keepachangelog.com/en/1.0.0/).

## [v0.11.1] - 2026-01-27

### 🛠 Refactors & Improvements
- **Release Strategy:** Verified the new branching model and "Main Branch Lock" mandate.
- **Maintenance:** Routine synchronization of metadata and documentation.

## [v0.11.0] - 2026-01-27

### 🚀 Features
- **Data Gallery:** New component for displaying collections in a responsive grid layout with support for search and pagination.
- **Shared Data Factory:** Extracted common Alpine.js logic into a reusable `base-data-component` factory for both Data Table and Data Gallery.
- **Pagination Trait:** Introduced `HasPagination` trait to standardize pagination properties and initialization across PHP components.

### 🛠 Refactors & Improvements
- **Performance:** Optimized client-side search indexing in the shared data factory to avoid redundant iterations.
- **Style:** Standardized `perPage` defaults to `10` across Data Table, Data Gallery, and the pagination trait.
- **Tailwind CSS:** Refactored dynamic grid and gap classes in Data Gallery to use literal values for reliable JIT compiler discovery.
- **Clean Code:** Refactored `DataTable` and `DataGallery` constructors to leverage the new `initializePagination` trait method.
- **DataTable:** Updated to use the shared `base-data-component` factory, reducing presentation code by over 200 lines.

### 📝 Documentation & Metadata
- **New Docs:** Added comprehensive documentation for the Data Gallery component.
- **Audit:** Added missing DocBlock documentation for the `DataTable` component class.
- **Instructions:** Updated installation guides with `dataGallery` Alpine.js registration details.
- **Metadata:** Synchronized `plume-api.json` and refreshed documentation files.

## [v0.10.0] - 2026-01-26

### 🚀 Features
- **Button:** Added automatic loading spinner for AJAX-based buttons (`method` + `href`).
- **Modal/Drawer:** Added `persistent` prop to prevent accidental closing via backdrop click or ESC key.
- **Data Table:** Added `plume-refresh` event listener for external table refreshing.

### 🐛 Fixes
- **Modal/Drawer:** Fixed "Undefined variable" error in by adding the `persistent` property to the component classes.
- **Button:** Fixed infinite recursion in `x-plume::button` when using AJAX path.
- **Form:** Removed non-existent `form.inline` component registration from `PlumeServiceProvider`.

### 📝 Documentation & Metadata
- **New Guides:** Added **Accessibility** (`docs/accessibility.md`) and **Best Practices & Performance** (`docs/best-practices.md`) documentation.
- **Forms:** Backfilled missing property descriptions for all Form components.
- **Enriched Content:** Added advanced usage patterns and real-world examples for Form, Data Table, Modal, Drawer, Toast, and Global Helpers.
- **Tooling:** Improved `sync_metadata.php` to handle complex DocBlocks with markdown and code fences.
- **Cleanup:** Decommissioned `COMPONENTS.md` in favor of more comprehensive markdown documentation.

## [v0.9.1] - 2026-01-26

### 🐛 Fixes
- **Blade Compiler:** Resolved a critical infinite recursion issue (PHP status 139) caused by nested Blade comments (`{{-- --}}`) in component DocBlocks.
- **Toaster:** Removed nested comments in the `Toaster` component header that triggered compilation errors.
- **Workbench:** Eliminated stray control characters (`\x01`, `\x02`) that were appearing before and after property tables across all documentation pages.

### 📝 Documentation & Metadata
- **DocBlocks:** Standardized usage examples in component headers to avoid nested comment markers.
- **Metadata:** Synchronized `plume-api.json` and Markdown docs to reflect the latest DocBlock improvements.

## [v0.9.0] - 2026-01-26

### 🚀 Features
- **Button:** Switched to native `confirm()` for better stability and simpler implementation.

### 🐛 Fixes
- **FileInput:** Refactored error synchronization to be idiomatic Alpine.js, removing brittle `__x` usage.
- **DataTable:** Improved reactivity after fetch operations by ensuring unique keys and data copying.

### 📝 Documentation & Metadata
- **DataTable:** Split comprehensive documentation into multiple manageable pages (Columns, Server-side, Actions).
- **Toaster:** Updated `Toaster` and `Toast` documentation.
- **Library-wide:** Synchronized all DocBlocks, `plume-api.json`, and installation instructions across the library and workbench.
- **Metadata:** Enhanced `sync_metadata.php` script for robust parsing of property descriptions and usage examples.

### 🧹 Chores
- **Audit:** Completed a pre-release consistency audit for Dark Mode, icon naming, and prop casing.

## [v0.8.0] - 2026-01-25

### 🚀 Features
- **Form:** Added `showAlerts` prop to optionally hide automatic feedback alerts.

### 🐛 Fixes
- **DataTable:** Fixed async race condition using `latestRequestId` counter.
- **DataTable:** Resolved `RangeError` (Maximum call stack size exceeded) in Alpine.js DevTools by moving slots to a private closure.
- **FileInput:** Fixed validation errors not propagating to parent form by implementing `syncErrors`.
- **Figure:** Added attribute splitting to correctly route Alpine.js bindings (e.g., `:src`) to the inner `img` tag instead of the `figure` container.
- **Button:** Fixed `SyntaxError: Invalid or unexpected token` in Blade templates by removing unnecessary backslash escaping.
- **Button:** Resolved `TypeError: Cannot read properties of undefined (reading 'click')` by implementing a global event-based confirmation system (`@confirm-[id]`).

### 🧹 Chores
- **Metadata:** Synchronized component API definitions and documentation.
- **Formatting:** Applied Prettier and ESLint formatting across the library.

## [v0.7.3] - 2026-01-25

### 🚀 Features
- **AJAX Buttons:** Buttons using a `method` (POST, PUT, PATCH, DELETE) now automatically submit via AJAX.
- **Button Callbacks:** Added `onSuccess` and `onError` props to the `Button` component.

### 🐛 Fixes
- **DataTable:** Implemented a `loadingCount` mechanism to robustly handle concurrent fetch requests.
- **Architecture:** Fixed scope shadowing in the button component by aliasing the component reference.

## [v0.7.2] - 2026-01-25

### 🐛 Fixes
- **DataTable:** Fixed a race condition where stale fetch responses could incorrectly clear the loading state or overwrite newer data.
- **Form:** Added a processing guard to prevent duplicate or concurrent form submissions.

## [v0.7.1] - 2026-01-25

### 🐛 Fixes
- **Form:** Fixed `formData` initialization to ensure it correctly handles both PHP arrays and raw JavaScript object strings, preventing broken `x-model` bindings.

## [v0.7.0] - 2026-01-25

### 🚀 Features
- **Standardized Callbacks:** Implemented optional callback props across the entire library (Modal, Drawer, Tabs, Combobox, Search, Calendar, Stepper, Carousel, Video, Accordion).
- **Form Enhancements:** Added `onSuccess`, `onError`, and `resetOnSuccess` props.
- **Architecture:** Extracted logic for `Tabs`, `Search`, and `Stepper` into dedicated AlpineJS plugins and standardized `x-data` initialization.

## [v0.6.5] - 2026-01-25

### 🐛 Fixes
- **Form File:** Fixed reactivity issue with progress bar updates by ensuring object replacement in the files array.
- **Form File:** Fixed a 'ghost' removal button that could sometimes appear even when hidden by switching to `x-show`.
- **Button:** Refined `confirm` slot detection to be more robust by verifying it is an instance of `ComponentSlot`.
- **Button:** Fixed a typo in the Tailwind icon selector.

## [v0.6.4] - 2026-01-25

### 🐛 Fixes
- **Form:** Fixed HTTP method detection to support Laravel's method spoofing.
- **Form:** Fixed model synchronization for nested paths in File Input.
- **Form:** Prevented "busy" state hang during file upload errors.
- **Form:** Improved CSRF token retrieval.

## [v0.6.3] - 2026-01-25

### 🚀 Features
- **Form:** Added immediate file upload strategy with progress tracking.
- **Button:** Added support for confirmation dialogs via the `confirm` prop and slot.
- **DataTable:** Added support for constructed columns and named slots.

## [v0.6.2] - 2026-01-25

### 🛠 Refactors & Improvements
- **Workflow:** Enhanced release automation to include version updates in `composer.json` and `package.json`.
- **Documentation:** Standardized code block formatting across Workbench documentation.

## [v0.6.0] - 2026-01-23

### 🚀 Features
- **Metadata:** Added `ide.json` for better IDE autocompletion support.
- **Testing:** Integrated Vitest for isolated Alpine.js plugin testing.
- **Card:** Added support for clickable cards via `href` prop with visual feedback.
- **Navbar:** Added support for `sticky` positioning and simplified layout.
- **Architecture:** Implemented component aliasing to prevent scope shadowing (e.g., in Combobox).

### 🛠 Refactors & Improvements
- **Structure:** Standardized sub-component file structures for consistency.
- **Theme:** Centralized theme configuration and extracted transition logic.
- **Naming:** Renamed `destructive` style to `error` for clarity.

### 🐛 Fixes
- **DataTable:** Fixed pagination reset when searching in client-side mode.
- **Accordion:** Fixed state management bug.
- **Combobox:** Fixed undefined variable errors and scope shadowing issues.
- **Navbar:** Prevented slot content from collapsing/squishing.
- **Table:** Fixed cell alignment inheritance from parent rows.

### 🧪 Tests
- **Coverage:** Added comprehensive unit tests for all Alpine.js plugins (Accordion, Calendar, Carousel, Combobox, Command, DataTable, Drawer, FileInput, Form, Modal, Page, Pagination, Toaster, Video).
- **Accessibility:** Systematic ARIA attribute verification for all components.
- **Context:** Added tests for context-aware rendering of sub-components.

### 📝 Documentation
- **Sync:** Automated metadata synchronization.
- **Coverage:** Replaced `COMPONENTS.md` with Workbench documentation source of truth.

## [v0.5.0] - 2026-01-22

### 🚀 Features
- **DataTable:** Added server-side fetching support via the `url` property.
- **DataTable:** Introduced the `fixed-height` property to maintain UI stability during pagination.
- **API Support:** Created the `DataTableResponse` class for standardized server-side response handling in Laravel.

### 🐛 Fixes
- **DataTable:** Resolved issues with pagination reactivity and labels when using server-side data.
- **Pagination:** Improved internal state management using `data-` attributes and custom events for better cross-component communication.

### 📝 Documentation
- **Restructuring:** Modularized documentation into individual `.md` files within the `docs/` directory for better maintainability and readability.
- **Enhanced Content:** Added detailed "Use Cases" for all 42+ components and comprehensive guides for Installation, Theming, and Global Helpers.

## [v0.4.0] - 2026-01-21

### 🚀 Features
- **Alpine Form Plugin:** Introduced a robust `form()` Alpine plugin for seamless state management, validation error handling (`getError`, `hasError`), and AJAX submissions.
- **PlumeResponse:** Added a standardized Laravel response class for API consistency.
- **Form Component:**
    - Added `x-plume::form` component that auto-initializes the plugin.
    - Added `hideOnSuccess` prop to optionally hide form fields after successful submission.
    - Added `submitButton` and `resetButton` props for auto-generating footer actions.
    - Added `inline` prop to support inline form layouts (replacing the deprecated `form.inline` component).
- **Accessibility:** Implemented comprehensive ARIA support, focus trapping, and focus recovery for **Modal**, **Drawer**, and **Command** components.
- **Accessibility:** Added `aria-describedby` and `aria-invalid` attributes to all form inputs, linking them to their error messages.

### 🛠 Refactors & Improvements
- **Breadcrumbs:** Simplified the API to accept a single `$items` array and automatically handle separators. Defaults to `minor` button style for items.
- **Tailwind Compliance:** Refactored dynamic CSS class construction (e.g., `grid-cols-{$n}`) to use static lookup tables for better compatibility with the Tailwind JIT compiler.
- **Structural Refactor:** Standardized directory structures for `Accordion`, `Breadcrumb`, `Carousel`, `Command`, `Navbar`, `Progress`, `Search`, and `Stepper` components (moving them to nested `Component/Item` patterns).
- **File Input:** Changed the hidden file input to `sr-only` to ensure keyboard accessibility.

### 🐛 Fixes
- **Button:** Fixed an issue where the `type` attribute could not be overridden (defaulted to `button`).
- **Form:** Fixed `isDirty` state not resetting correctly after a successful submission.
- **Form:** Fixed data scoping issues in inline forms.
- **CSRF:** Improved CSRF token detection to check both meta tags and input fields.

### 🧹 Chores
- **Documentation:** Added missing `@description` DocBlocks to ~40 components.
- **Tooling:** Added `sync_metadata.php` script to automate documentation synchronization.
- **Testing:** Added `ComprehensiveRenderTest` to smoke-test all components.
- **Community:** Added `CONTRIBUTING.md`, `ISSUE_TEMPLATE`, and `PULL_REQUEST_TEMPLATE`.

## [v0.3.0] - 2026-01-20

### Added
- **View Class Migration**: Successfully migrated all core components to dedicated PHP View Classes for better logic encapsulation and property handling.

### Fixed
- **Progress Bar**: Fixed initialization issues, improved reactivity, and added value clamping (0-100).
- **Dark Mode**: Audited components and added missing dark mode color variants for `SearchResult`, `StepperStep`, and `CommandItem`.
- **Command Palette**: Corrected slot handling and improved search result styling.
- **Table**: Improved sticky header behavior and border consistency.
- **Button Group**: Refined inheritance and styling for stacked buttons.
- **Accessibility**: Continued auditing and refining ARIA attributes across complex components.

## [v0.2.0] - 2026-01-17

### Added
- Card: `badge` and `badgeStyle` props for easier header badges.
- Popover & Dropdown: `trigger` prop for simplified string-based triggers.
- Navbar: `mobileMenu` slot for better scope management of mobile menus.
- Edge Case Tests: Comprehensive tests for empty/boundary values across multiple components.

### Changed
- **BREAKING**: Renamed table sub-components to match standard HTML tags (`x-plume::table.thead`, `x-plume::table.th`, `x-plume::table.tbody`, `x-plume::table.tr`, `x-plume::table.td`).
- **BREAKING**: Refactored `popover` to use a single component with a `trigger` prop/slot and default slot for content. Removed `popover.trigger` and `popover.content` sub-components.
- Dropdown: Can now use a `trigger` prop instead of a mandatory slot for simple text triggers.
- Code style: Applied Prettier and ESLint formatting project-wide.

### Fixed
- Navbar: Fixed mobile toggle visibility and menu state scoping.
- Popover: Fixed component file corruption and default trigger styling.
- Documentation: Corrected multiple syntax errors and layout issues in examples.

## [v0.1.1] - 2026-01-17

### Fixed
- Added `x-cloak` to components using `x-show` to prevent initial page-load flicker.
- Improved dark mode visibility for browser-native icons in `date`, `time`, and `datetime` inputs.
- Enhanced dark mode consistency and contrast for `Carousel`, `EmptyState`, `Chart`, and `Command` components.

### Changed
- Standardized `form.time` and `form.datetime` components to use centralized `Form::inputClasses()`.

## [v0.1.0] - 2026-01-17

### Added
- **Global Alpine Magic Helpers: **
    - `$openModal(name)` and `$closeModal(name?)` for simplified modal control.
    - `$openDrawer(name)` and `$closeDrawer(name?)` for simplified drawer control.
    - `$toast(msg, options?)`, `$success(msg)`, and `$error(msg)` for quick notifications.
    - `$copy(text)` for programmatic clipboard access.
- **Components:**
    - New `minor` button style for subtle actions (scaled at 90%).
    - Support for YouTube and Vimeo embeds in the `Video` component.
    - Enhanced `Figure` component with `srcset`, `sizes`, and `sources` slot support.
    - `Calendar` component now supports date range selection and restrictions (`min`/`max`).
    - `Toaster` now supports `top-center` and `bottom-center` positions.
    - `Table` component now supports `sticky-header` and cell alignment.

### Changed
- **Refactoring:**
    - Extracted all component JavaScript logic into dedicated AlpineJS plugin files in `resources/js/alpine`.
    - Standardized transitions and layout logic across all overlay components using the `Theme` helper class.
    - Refactored `Drawer` from inline logic to a dedicated Alpine plugin.
    - Unified Modal closing logic (Escape key and Backdrop click now use the internal `close()` method).

### Fixed
- Improved dark mode consistency for backdrops, dividers, tables, and charts.
- Fixed `Command` palette backdrop positioning and footer contrast in dark mode.
- Improved `Avatar` status indicator contrast in dark mode.
- Enhanced `Badge` contrast and accessibility.

## [v0.0.1] - 2026-01-16
- Initial internal release.

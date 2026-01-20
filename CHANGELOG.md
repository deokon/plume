# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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
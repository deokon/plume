# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [v0.1.0] - 2026-01-17

### Added
- **Global Alpine Magic Helpers:**
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

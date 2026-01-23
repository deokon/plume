# Plume UI

A comprehensive, responsive, and beautiful component library for Laravel, built with Blade, Alpine.js, and Tailwind CSS v4.

## 📖 Documentation

For detailed guides and component references, see the **[Documentation Index](docs/README.md)**.

## Installation

### 1. Install via Composer

```bash
composer require deokon/plume
```

### 2. Assets Setup

#### Iconify (Required)

```bash
npm install -D @iconify/tailwind4 @iconify-json/fluent
```

#### Tailwind CSS (v4)

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

#### Alpine.js

Register the provided plugins in your `app.js`:

```javascript
// resources/js/app.js
import Alpine from "alpinejs";
import { 
    modal, 
    drawer, 
    toaster, 
    page, 
    clipboard, 
    pagination, 
    dataTable, 
    calendar,
    carousel,
    combobox,
    command,
    fileInput,
    video,
    accordion
} from "../../vendor/deokon/plume/resources/js";

Alpine.plugin(modal);
Alpine.plugin(drawer);
Alpine.plugin(toaster);
Alpine.plugin(page);
Alpine.plugin(clipboard);

// Data components
Alpine.data('pagination', pagination);
Alpine.data('dataTable', dataTable);
// ... register others as needed

window.Alpine = Alpine;
Alpine.start();
```

### 3. Global Magic Helpers

Plume provides powerful shorthands for common tasks:

```javascript
// Open/Close Overlays
$openModal('login-modal')
$closeModal()
$openDrawer('settings')

// Notifications
$success('Profile updated!')
$error('Failed to save')
$toast('Processing...', { type: 'info' })

// Utilities
$copy('Text to copy')
```

## Available Components

- **Overlays:** Modal, Drawer, Alert Dialog, Popover, Tooltip, Toast
- **Navigation:** Navbar, Breadcrumb, Pagination, Stepper, Tabs
- **Data:** Table, Data Table (sorting/filtering), Chart (bar/line), Calendar
- **Forms:** Input, Password, Number, Textarea, Select, Combobox, Checkbox, Radio, Toggle, File Upload, Date/Time
- **Layout:** Card, Accordion, Divider, Aspect Ratio, Gallery, Spacer
- **Feedback:** Alert, Badge, Spinner, Skeleton Loader, Progress Bar
- **Media:** Video Player (HTML5, YouTube, Vimeo), Audio Player, Figure, Avatar
- **Typography:** Code Snippets, Kbd

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
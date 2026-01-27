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

Register the provided plugins and data components in your `app.js`:

```javascript
// resources/js/app.js
import Alpine from "alpinejs";
import { 
    modal, 
    drawer, 
    toaster, 
    page, 
    clipboard, 
    form,
    pagination, 
    dataTable, 
    dataGallery,
    calendar,
    carousel,
    combobox,
    command,
    fileInput,
    video,
    accordion,
    accordionItem,
    tabs,
    search,
    stepper
} from "../../vendor/deokon/plume/resources/js";

// Register core plugins
Alpine.plugin(modal);
Alpine.plugin(drawer);
Alpine.plugin(toaster);
Alpine.plugin(page);
Alpine.plugin(clipboard);
Alpine.plugin(form);

// Register data components manually to ensure they are available in expressions
Alpine.data('pagination', pagination);
Alpine.data('dataTable', dataTable);
Alpine.data('dataGallery', dataGallery);
Alpine.data('calendar', calendar);
Alpine.data('carousel', carousel);
Alpine.data('combobox', combobox);
Alpine.data('command', command);
Alpine.data('fileInput', fileInput);
Alpine.data('video', video);
Alpine.data('accordion', accordion);
Alpine.data('accordionItem', accordionItem);
Alpine.data('tabs', tabs);
Alpine.data('search', search);
Alpine.data('stepper', stepper);

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
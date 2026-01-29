# Behavior & Logic Customization

Learn how to extend and override the default behavior of Plume components through PHP and Alpine.js.

## 1. Extending Component Logic (PHP)

Every Plume component is a standard Laravel View Component. You can override its logic by creating a local class that extends the library class.

### Example: Customizing Button Classes
Suppose you want to fundamentally change how buttons resolve their CSS classes without publishing the views.

1. **Create your component class:**
```php
namespace App\View\Components;

use deokon\Plume\View\Components\Button\Button as PlumeButton;

class MyButton extends PlumeButton
{
    public function classes(string $size = 'md', string $style = 'default', string $shape = 'default'): string
    {
        $base = parent::classes($size, $style, $shape);
        
        // Add a global custom class to all buttons
        return $base . ' my-project-button';
    }
}
```

2. **Re-register the component:**
In your `AppServiceProvider.php`, use the `Blade::component` method to point the library namespace to your local class.

```php
use Illuminate\Support\Facades\Blade;
use App\View\Components\MyButton;

public function boot()
{
    Blade::component('plume::button', MyButton::class);
}
```

## 2. Parent Context & Global Defaults

Plume components are "aware" of their parent containers. This allows you to set consistent defaults for a group of components.

### Form-Wide Defaults
Wrapping components in an `x-plume::form` or `x-plume::form.group` can set defaults like `size` or `style` for all children automatically.

```blade
{{-- All inputs inside this group will inherit size="sm" --}}
<x-plume::form.group size="sm" label="User Details">
    <x-plume::form.input label="First Name" name="first_name" />
    <x-plume::form.input label="Last Name" name="last_name" />
</x-plume::form.group>
```

### Implementing Your Own Aware Logic
In your own components, you can use the `@aware` directive to tap into this system:

```blade
{{-- Your custom component --}}
@aware(['size' => 'md'])

<div class="{{ $size === 'sm' ? 'p-2' : 'p-4' }}">
    ...
</div>
```

## 3. Alpine.js Customization

### Standardized Callbacks
Interactive components provide standardized callback props that can execute Alpine.js expressions or JavaScript functions.

| Component | Callbacks |
| :--- | :--- |
| **Form** | `onSuccess`, `onError` |
| **Modal / Drawer** | `onOpen`, `onClose` |
| **Combobox / Search** | `onSelect` |
| **Carousel** | `onSlideChange` |
| **Stepper** | `onStepChange`, `onFinish` |

```blade
<x-plume::form onSelect="$toast('Selected: ' + result.label)">
    ...
</x-plume::form>
```

### Global Magic Helpers
Plume registers several global magic helpers (`$`) that you can use in any Alpine.js expression in your project:

- `$openModal(name)` / `$closeModal(name)`
- `$openDrawer(name)` / `$closeDrawer(name)`
- `$success(message)` / `$error(message)` / `$toast(message, config)`
- `$copy(text)`

### Overriding Alpine Logic
If you need to fundamentally change how a component works on the frontend, you can re-register the Alpine data component after the Plume plugin has loaded.

```javascript
// resources/js/app.js
import Alpine from "alpinejs";
import Plume from "../../vendor/deokon/plume/resources/js";

Alpine.plugin(Plume);

// Override the 'combobox' logic with your own implementation
Alpine.data('combobox', (options, model, config) => ({
    // Your custom logic here...
}));

Alpine.start();
```

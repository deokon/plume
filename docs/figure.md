# Figure

Enhanced image component with captions, aspect ratio control, and support for modern image formats.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `src` | `string` | `null` | The image source URL. |
| `alt` | `string` | `''` | Alternative text for accessibility. |
| `caption` | `string` | `null` | Text caption displayed below the image. |
| `aspect` | `string` | `null` | Desired aspect ratio: 'square' (1:1), 'video' (16:9), 'standard' (4:3), 'portrait' (3:4), 'cinema' (21:9), 'vertical' (9:16). Supports both '4/3' and '4:3' notations. |
| `srcset` | `string` | `null` | Responsive image sources. |
| `sizes` | `string` | `null` | Responsive image sizes. |


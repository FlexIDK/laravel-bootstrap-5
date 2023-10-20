# Laravel Bootstrap 5 Blade components

---

## Components list

### Accordion

### Alert

```php
/**
 * $size: [null],sm,lg 
 * $color: [primary],secondary,success,danger,warning,info,light,dark,link
 * $type: [null],button,submit,reset
 * $active: only if $toggle=true
 */

<x-bootstrap::button
    :color="{string=primary}"
    :outline="{bool=false}"
    :type="{?string}"
    :href="{?string}"
    :size="{?string}"
    :value="{string}"
    :disabled="{bool=false}"
    :toggle="{bool=false}"
    :active="{bool=false}"
    :nowrap="{bool=false}"
/>

<x-bootstrap::button
    :color="{string=primary}"
    :outline="{bool=false}"
    :type="{?string}"
    :href="{?string}"
    :size="{?string}"
    :disabled="{bool=false}"
    :toggle="{bool=false}"
    :active="{bool=false}"
    :nowrap="{bool=false}"
>
    // content
</x-bootstrap::button>
```

### Badge

### Breadcrumb

### Close

```php
<x-bootstrap::close
    :dismiss="{?string}"
/>
```

### Icon

```php
/**
 * $color: [null],primary,secondary,success,danger,warning,info,light,dark
 * $category: [null],solid,regular,brands
 */

<x-bootstrap::icon
    :name="{string}"
    :color="{?string}"
    :category={?string}
/>

// -> <i class="fa fa-${name}"></i>
```

### Root

```php
<x-bootstrap::root>
    // content
</x-bootstrap::root>

// -> <div>${slot}</div>
```

### Tooltip

### Buttons

### Button group

### Card

### Carousel

### Collapse

### Dropdowns

### List group

### Modal

### Navbar

### Navs & tabs

### Offcanvas

### Pagination

### Placeholders

### Popovers

### Progress

### Scrollspy

### Spinners

### Toasts


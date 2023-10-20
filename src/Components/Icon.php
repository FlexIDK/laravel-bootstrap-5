<?php

namespace One23\LaravelBootstrap5\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use One23\LaravelBootstrap5\Traits;

class Icon extends Component
{
    use Traits\CategoryIcon;
    use Traits\Color;

    public function __construct(
        string $color = null,
        string $category = null,
    ) {
        $this->initColorDefault($color);
        $this->initCategoryIconDefault($category);
    }

    public function render(): View|Closure|string
    {
        return view(
            'bootstrap::components.icon',
            [
            ]
        );
    }
}

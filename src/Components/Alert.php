<?php

namespace One23\LaravelBootstrap5\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use One23\LaravelBootstrap5\Traits;

class Alert extends Component
{
    use Traits\Color;

    public function __construct(
        string $color = 'primary',
    ) {
        $this->initColorDefault($color);
    }

    public function render(): View|Closure|string
    {
        return view(
            'bootstrap::components.alert',
            [
            ]
        );
    }
}

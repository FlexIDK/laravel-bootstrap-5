<?php

namespace One23\LaravelBootstrap5\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectOptions extends Component
{
    public function __construct(
        public mixed $value
    ) {}

    public function render(): View|Closure|string
    {
        return view(
            'bootstrap::components.select-options',
            [
            ]
        );
    }
}

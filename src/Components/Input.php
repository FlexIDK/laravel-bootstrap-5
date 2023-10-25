<?php

namespace One23\LaravelBootstrap5\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use One23\LaravelBootstrap5\Traits;

class Input extends Component
{
    use Traits\Value;

    public function __construct(
        public ?string $name = null,
        public mixed $value = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view(
            'bootstrap::components.input',
            [
            ]
        );
    }
}

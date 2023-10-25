<?php

namespace One23\LaravelBootstrap5\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use One23\LaravelBootstrap5\Traits;

class Radio extends Component
{
    use Traits\ValueRadio;

    public function __construct(
        public mixed $value,
        public ?string $name = null,
        public bool $checked = false,
    ) {}

    public function render(): View|Closure|string
    {
        return view(
            'bootstrap::components.radio',
            [
            ]
        );
    }
}

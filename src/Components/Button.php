<?php

namespace One23\LaravelBootstrap5\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use One23\LaravelBootstrap5\Traits;

class Button extends Component
{
    use Traits\Color;

    public function __construct(
        string $color = null,
        public bool $outline = false,
    ) {
        $this->colorButtonInit($color);
        // todo type
        // todo size
    }

    public function render(): View|Closure|string
    {
        return view(
            'bootstrap::components.button',
            [
                'colorButton' => $this->colorButton(),
            ]
        );
    }
}

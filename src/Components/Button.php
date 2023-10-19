<?php

namespace One23\LaravelBootstrap5\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use One23\LaravelBootstrap5\Traits;

class Button extends Component
{
    use Traits\Color;
    use Traits\SizeButton;
    use Traits\TypeButton;

    public function __construct(
        string $color = null,
        public bool $outline = false,
        string $type = null,
        public ?string $href = null,
        string $size = null,
    ) {
        $this->colorButtonInit($color);
        $this->typeButtonDefaultInit($type);
        $this->sizeButtonDefaultInit($size);
    }

    public function render(): View|Closure|string
    {
        return view(
            'bootstrap::components.button',
            [
            ]
        );
    }
}

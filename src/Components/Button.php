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
        string $color = 'primary',
        public bool $outline = false,
        ?string $type = null,
        public ?string $href = null,
        ?string $size = null,
    ) {
        $this->initColorButton($color);
        $this->initTypeButtonDefault($type);
        $this->initSizeButtonDefault($size);
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

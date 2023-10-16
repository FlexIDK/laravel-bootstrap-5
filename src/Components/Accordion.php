<?php

namespace One23\LaravelBootstrap5\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use One23\LaravelBootstrap5\Traits;

class Accordion extends Component
{
    use Traits\Random;

    public function __construct(
        public ?string $id = null,
    ) {
        $this->id = $id ?: $this->idCreate('accordion');
    }

    public function render(): View|Closure|string
    {
        return view(
            'bootstrap::components.accordion',
            [
            ]
        );
    }
}

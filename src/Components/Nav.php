<?php

namespace One23\LaravelBootstrap5\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use One23\LaravelBootstrap5\Traits;

class Nav extends Component
{
    use Traits\Random;

    public function __construct(
        public ?string $id = null,
        public ?string $parentId = null,
        public bool $show = false,
    ) {
        $this->id = $id ?: $this->idCreate('nav');
    }

    public function render(): View|Closure|string
    {
        return view(
            'bootstrap::components.nav',
            [
            ]
        );
    }
}

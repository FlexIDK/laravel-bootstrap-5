<?php

namespace One23\LaravelBootstrap5\Components;

use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

class Breadcrumb extends Component
{
    /**
     * @param array{array{name: string, href: string, active: boolean}} $items
     * @param string|null $divider
     */
    public function __construct(
        public array $items = [],
        public ?string $divider = null,
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('bs5::components.breadcrumb');
    }
}

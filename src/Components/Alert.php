<?php

namespace One23\LaravelBootstrap5\Components;

use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $label = null,
        public $color = "success",
        public $dismissible = false,
        public $icon = null,
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
        return view('bs5::components.alert');
    }
}

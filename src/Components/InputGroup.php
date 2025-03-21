<?php

namespace One23\LaravelBootstrap5\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use One23\LaravelBootstrap5\Traits;

class InputGroup extends Component
{
    use Traits\UniqId;
    use Traits\Value;

    public function __construct(
    ) {}

    public function render(): View|Closure|string
    {
        return view(
            'bootstrap::components.input-group',
            [
                'id' => $this->uniqId(),
            ]
        );
    }
}

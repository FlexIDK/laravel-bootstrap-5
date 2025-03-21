<?php

namespace One23\LaravelBootstrap5\Traits;

use Illuminate\Support\Arr;

/**
 * @property string|null $name
 * @property bool $checked
 */
trait ValueCheckbox
{
    public function currentChecked(): bool
    {
        if (is_null($this->name)) {
            return $this->checked;
        }

        if (! session()->has('_old_input')) {
            return $this->checked;
        }

        $old = (array)session()->get('_old_input', []);

        $name = $this->name;
        if (Arr::has($old, $name)) {
            return old($name);
        }

        return $this->checked;
    }
}

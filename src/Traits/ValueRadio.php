<?php

namespace One23\LaravelBootstrap5\Traits;

/**
 * @property string|null $name
 * @property bool $checked
 * @property mixed $value
 */
trait ValueRadio
{
    public function currentChecked(): bool
    {
        if (is_null($this->name)) {
            return $this->checked;
        }

        if (! session()->has('_old_input')) {
            return $this->checked;
        }

        if ($this->value === null) {
            return $this->checked;
        }

        return old($this->name) === $this->value;
    }
}

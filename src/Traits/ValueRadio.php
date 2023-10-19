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

        if (is_null(old($this->name))) {
            return $this->checked;
        }

        return old($this->name) === $this->value;
    }
}

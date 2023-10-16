<?php

namespace One23\LaravelBootstrap5\Traits;

/**
 * @property string|null $name
 * @property mixed $value
 */
trait Value {

    public function currentValue(): mixed {
        if (is_null($this->name)) {
            return $this->value;
        }

        if (is_null(old($this->name))) {
            return $this->value;
        }

        return old($this->name);
    }

}

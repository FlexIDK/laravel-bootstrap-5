<?php

namespace One23\LaravelBootstrap5\Traits;

use Illuminate\Support\Arr;
use One23\LaravelBootstrap5\Components;

/**
 * @property string|null $name
 * @property mixed $value
 *
 * @function old($name)
 */
trait Value
{
    public function getValue(): mixed
    {
        if (property_exists($this, 'value')) {
            if ($this->value instanceof \UnitEnum) {
                if ($this->value instanceof \BackedEnum) {
                    return $this->value->value;
                } else {
                    return $this->value->name;
                }
            }

            return $this->value;
        }

        return null;
    }

    public function currentValue(): mixed
    {
        if (is_null($this->name ?? null)) {
            return $this->getValue();
        }

        if (
            static::class === Components\Input::class &&
            $this->attributes->has('type') &&
            $this->attributes->get('type') === 'password'
        ) {
            return null;
        }

        if (! session()->has('_old_input')) {
            return $this->getValue();
        }

        $old = (array)session()->get('_old_input', []);

        $name = $this->name;
        if (preg_match(
            '/^(.*)?\[(.*)?\]/ui',
            $this->name,
            $match
        )) {
            $name = $match[1];
        }

        if (Arr::has($old, $name)) {
            return old($name);
        }

        return $this->getValue();
    }
}

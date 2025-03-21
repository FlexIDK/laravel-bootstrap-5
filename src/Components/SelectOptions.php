<?php

namespace One23\LaravelBootstrap5\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectOptions extends Component
{
    public function __construct(
        public mixed $value
    ) {}

    protected static function isEqual(
        mixed $val1,
        mixed $val2,
    ): bool {
        if (
            $val1 instanceof \UnitEnum &&
            $val2 instanceof \UnitEnum &&
            $val1::class !== $val2::class
        ) {
            return false;
        }

        if ($val1 instanceof \UnitEnum) {
            $val1 = $val1 instanceof \BackedEnum
                ? $val1->value
                : $val1->name;
        }

        if ($val2 instanceof \UnitEnum) {
            $val2 = $val2 instanceof \BackedEnum
                ? $val2->value
                : $val2->name;
        }

        //

        if (is_numeric($val1)) {
            if (! is_numeric($val2)) {
                return false;
            }

            return (int)$val2 === (int)$val1;
        }

        if (is_string($val1)) {
            return $val1 === (string)$val2;
        }

        return false;
    }

    public static function isSelected(
        mixed $key,
        mixed $values
    ): bool {
        if (
            is_null($key) &&
            (
                is_null($values) ||
                (is_array($values) && empty($values))
            )
        ) {
            return true;
        }

        if (is_array($values)) {
            foreach ($values as $value) {
                if (static::isEqual($key, $value)) {
                    return true;
                }
            }

            return false;
        }

        return static::isEqual($key, $values);
    }

    public function render(): View|Closure|string
    {
        return view(
            'bootstrap::components.select-options',
            [
            ]
        );
    }
}

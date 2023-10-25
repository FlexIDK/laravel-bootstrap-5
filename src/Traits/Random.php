<?php

namespace One23\LaravelBootstrap5\Traits;

/**
 * @property string|null $name
 * @property mixed $value
 */
trait Random
{
    public function idCreate(string $key)
    {
        return "bootstrap-{$key}-" . mt_rand(100000, 999999);
    }
}

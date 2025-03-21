<?php

namespace One23\LaravelBootstrap5\Traits;

/**
 * @property string|null $id
 */
trait UniqId
{
    public function uniqId(): ?string
    {
        if (
            isset($this->id)
        ) {
            return ! empty($this->id)
                ? $this->id
                : null;
        }

        return 'uniq-id--' . md5(microtime(true));
    }
}

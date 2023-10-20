<?php

namespace One23\LaravelBootstrap5\Traits;

/**
 * @property string|null $href
 */
trait TypeButton
{
    public ?string $typeButton = null;

    protected array $typeButtonAvailable = [
        'button',
        'submit',
        'reset',
    ];

    protected function initTypeButtonDefault(
        string $typeButton = null,
    ): void {
        $this->typeButton = $typeButton;

        if ($this?->href) {
            $this->typeButton = null;
        } elseif (
            is_null($this->href) &&
            is_null($this->typeButton)
        ) {
            $this->href = 'javascript:;';
        }

        if (
            ! is_null($this->typeButton) &&
            ! in_array($this->typeButton, $this->typeButtonAvailable)
        ) {
            throw new ("undefined type `{$this->typeButton}`");
        }
    }

    //

    public function typeButton(): ?string
    {
        return $this->typeButton;
    }
}

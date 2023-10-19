<?php

namespace One23\LaravelBootstrap5\Traits;

trait SizeButton
{
    public ?string $sizeButton = null;

    protected array $sizeButtonAvailable = [
        'lg',
        'sm',
    ];

    protected function sizeButtonDefaultInit(
        string $typeButton = null,
    ): void {
        $this->sizeButton = $typeButton;

        if (
            ! is_null($this->sizeButton) &&
            ! in_array($this->sizeButton, $this->sizeButtonAvailable)
        ) {
            throw new ("undefined size `{$this->sizeButton}`");
        }
    }

    //

    public function sizeButton(): ?string
    {
        return 'btn-'.$this->sizeButton;
    }
}
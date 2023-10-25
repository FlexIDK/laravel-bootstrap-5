<?php

namespace One23\LaravelBootstrap5\Traits;

/**
 * @property bool $outline
 */
trait Color
{
    public ?string $color = null;

    protected array $colorAvailable = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
    ];

    protected function initColorDefault(
        string $color = null,
    ): void {
        $this->color = $color;

        if (
            ! is_null($this->color) &&
            ! in_array($this->color, $this->colorAvailable)
        ) {
            throw new ("undefined color `{$this->color}`");
        }
    }

    protected function initColorButton(
        string $color = null,
    ): void {
        $this->color = $color;

        if ($this->color === 'link') {
            return;
        }

        if (
            ! is_null($this->color) &&
            ! in_array($this->color, $this->colorAvailable)
        ) {
            throw new ("undefined color `{$this->color}`");
        }
    }

    //

    public function colorButton(): string
    {
        if (! $this->color) {
            return '';
        }

        if ($this->color === 'link') {
            return 'btn-' . $this->color;
        }

        return $this->outline
            ? 'btn-outline-' . $this->color
            : 'btn-' . $this->color;
    }

    public function colorAlert(): string
    {
        return $this->color
            ? 'alert-' . $this->color
            : '';
    }

    public function colorText(): string
    {
        return $this->color
            ? 'text-' . $this->color
            : '';
    }

    public function colorBadge(): string
    {
        return $this->color
            ? 'text-bg-' . $this->color
            : '';
    }
}

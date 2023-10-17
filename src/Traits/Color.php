<?php

namespace One23\LaravelBootstrap5\Traits;

/**
 * @property string|null $name
 * @property mixed $value
 */
trait Color {

    public string $color = 'primary';

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

    protected function colorDefaultInit(
        string $color = null,
    ): void {
        if ($color) {
            $this->color = $color;
        }

        if (!in_array($this->color, $this->colorAvailable)) {
            throw new ("undefined color `{$this->color}`");
        }
    }

    protected function colorButtonInit(
        string $color = null,
    ): void {
        if ($color) {
            $this->color = $color;
        }

        if ($this->color === 'link') {
            return;
        }

        if (!in_array($this->color, $this->colorAvailable)) {
            throw new ("undefined color `{$this->color}`");
        }
    }

    //

    protected function colorButton(): string {
        if ($this->color === 'link') {
            return 'btn-' . $this->color;
        }

        return $this?->outline
            ? 'btn-outline-' . $this->color
            : 'btn-' . $this->color;
    }

    protected function colorAlert(): string {
        return 'alert-' . $this->color;
    }

    protected function colorText(): string {
        return 'text-' . $this->color;
    }

    public function colorBadge(): string {
        return 'text-bg-' . $this->color;
    }

}

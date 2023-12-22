<?php

namespace One23\LaravelBootstrap5\Traits;

trait CategoryIcon
{
    public ?string $categoryIcon = null;

    protected array $categoryIconAvailable = [
        'solid',
        'regular',
        'brands',
    ];

    protected function initCategoryIconDefault(
        ?string $styleIcon = null,
    ): void {
        $this->categoryIcon = $styleIcon;

        if (
            ! is_null($this->categoryIcon) &&
            ! in_array($this->categoryIcon, $this->categoryIconAvailable)
        ) {
            throw new ("undefined size `{$this->categoryIcon}`");
        }
    }

    //

    public function categoryIcon(): string
    {
        return 'fa' . ($this->categoryIcon ? '-' . $this->categoryIcon : '');
    }
}

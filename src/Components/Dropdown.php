<?php

namespace One23\LaravelBootstrap5\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use One23\LaravelBootstrap5\Exception;

class Dropdown extends Component
{
    const TYPE_FOOTER = 'footer';

    const TYPE_HEADER = 'header';

    const TYPE_DIVIDER = 'divider';

    const TYPE_LINK = 'link';

    const TYPE_TEXT = 'text';

    public function __construct(
        public ?array $items = []
    ) {}

    protected function item($val)
    {
        if (is_string($val)) {
            if (preg_match('/^##(\s+)?(.*)/', $val, $match)) {
                return [
                    'type' => static::TYPE_FOOTER,
                    'text' => $match[2],
                ];
            }

            if (preg_match('/^#(\s+)?(.*)/', $val, $match)) {
                return [
                    'type' => static::TYPE_HEADER,
                    'text' => $match[2],
                ];
            }

            if (preg_match('/^([*-]+)?\[([^\]]+)\]\((.*)\)$/', $val, $match)) {
                return [
                    'type' => static::TYPE_LINK,
                    'active' => str_contains($match[1], '*'),
                    'disable' => str_contains($match[1], '-'),
                    'text' => $match[2],
                    'href' => $match[3],
                ];
            }

            if (preg_match('/^-+$/', $val, $match)) {
                return [
                    'type' => static::TYPE_DIVIDER,
                ];
            }

            return [
                'type' => 'text',
                'text' => $val,
            ];
        } elseif (is_array($val)) {
            if (! is_null($val['href'] ?? null)) {
                $val['type'] = static::TYPE_LINK;
            }

            if (is_null($val['type'] ?? null)) {
                $val['type'] = static::TYPE_TEXT;
            }

            if (
                is_null($val['text'] ?? null) &&
                is_null($val['html'] ?? null)
            ) {
                throw new Exception('undefined `text`');
            }

            return $val;
        }

        return null;
    }

    public function items(): array
    {
        $res = [];

        array_walk($this->items, function($item) use (
            &$res
        ) {
            $res[] = $this->item($item);
        });

        return array_filter($res);
    }

    public function render(): View|Closure|string
    {
        return view(
            'bootstrap::components.dropdown',
            [
            ]
        );
    }
}

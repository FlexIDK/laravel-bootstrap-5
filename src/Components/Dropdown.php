<?php

namespace One23\LaravelBootstrap5\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use One23\LaravelBootstrap5\Exception;

class Dropdown extends Component
{
    public function __construct(
        public ?array $items = []
    ) {
    }

    protected function item($val)
    {
        if (is_string($val)) {
            if (preg_match('/^##(\s+)?(.*)/', $val, $match)) {
                return [
                    'type' => 'footer',
                    'text' => $match[2],
                ];
            }

            if (preg_match('/^#(\s+)?(.*)/', $val, $match)) {
                return [
                    'type' => 'header',
                    'text' => $match[2],
                ];
            }

            if (preg_match('/^-+$/', $val, $match)) {
                return [
                    'type' => 'divider',
                ];
            }

            if (preg_match('/(\*)?\[([^\]]+)\]\((.*)\)$/', $val, $match)) {
                return [
                    'type' => 'link',
                    'active' => (bool) $match[1],
                    'text' => $match[2],
                    'href' => $match[3],
                ];
            }

            return [
                'type' => 'text',
                'text' => $val,
            ];
        } elseif (is_array($val)) {
            if (! is_null($val['href'] ?? null)) {
                $val['type'] = 'link';
            }

            if (is_null($val['type'] ?? null)) {
                $val['type'] = 'text';
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

        array_walk($this->items, function ($item) use (
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

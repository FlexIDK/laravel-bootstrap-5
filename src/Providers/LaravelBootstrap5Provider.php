<?php

namespace One23\LaravelBootstrap5\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelBootstrap5Provider extends ServiceProvider
{
    public function boot(): void
    {
        $components = [];
        foreach (scandir(__DIR__ . '/../Components') as $file) {
            if (! str_ends_with($file, '.php')) {
                continue;
            }

            $key = 'bootstrap::' . \Str::kebab(substr($file, 0, -4));
            $value = 'One23\\LaravelBootstrap5\\Components\\' . substr($file, 0, -4);

            $components[$key] = $value;
        }

        $this->loadViewComponentsAs('', $components);

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'bootstrap'
        );
    }
}

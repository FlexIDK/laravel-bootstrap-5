<?php

namespace One23\LaravelBootstrap5\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use One23\LaravelBootstrap5\Components;

class LaravelBootstrap5Provider extends ServiceProvider
{
    public function boot()
    {
        Blade::componentNamespace('One23\\LaravelBootstrap5\\Components', 'bs5');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'bs5');

        $this->publishes(
            [__DIR__ . '/../../config/laravel-bootstrap-5.php' => config_path('laravel-bootstrap-5.php')],
            ['laravel-bootstrap-5', 'laravel-bootstrap-5:config']
        );

//        $this->publishes(
//            [__DIR__ . '/../../resources/views' => resource_path('views/vendor/bs5')],
//            ['laravel-bootstrap-5', 'laravel-bootstrap-5:views']
//        );

        $this->registerResources();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-bootstrap-5.php', 'laravel-bootstrap-5');

    }

    public function registerResources() {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'bs5');
    }


}

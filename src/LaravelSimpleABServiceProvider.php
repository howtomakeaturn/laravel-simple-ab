<?php

namespace Howtomakeaturn\LaravelSimpleAB;

use Illuminate\Support\ServiceProvider;

class LaravelSimpleABServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('laravel-simple-ab', function ($app) {
            $ab = new LaravelSimpleAB();

            return $ab;
        });
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'laravel-simple-ab');
    }
}

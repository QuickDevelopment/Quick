<?php

namespace QuickDevelopment\Quick\Providers;

use Illuminate\Support\ServiceProvider;

class QuickServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__."../../resources/views", 'quick');
        $this->publishes([__DIR__."../../resources/views"], 'quick-view');
        $this->loadRoutesFrom(__DIR__."../../routes");
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        if (app()->environment('local') && config('app.url')) {
            \Illuminate\Support\Facades\URL::forceRootUrl(config('app.url'));
        }

        // Paginator fix for Bootstrap 4 (since we are using it)
        \Illuminate\Pagination\Paginator::useBootstrapFour();
    }
}

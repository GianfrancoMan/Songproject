<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $locale = substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) ?? '';

        if(in_array($locale, config('app.available_locals'))) {
            App::setLocale($locale);
        }
    }
}

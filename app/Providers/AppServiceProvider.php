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
        //set Language for the App
        $locale = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? null;
        if($locale !== null) {
            $locale = substr($locale, 0 ,2);
            if(in_array($locale, config('app.available_locals'))) {
                App::setLocale($locale);
            }
        }
    }
}

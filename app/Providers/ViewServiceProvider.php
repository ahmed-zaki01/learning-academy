<?php

namespace App\Providers;

use App\Cat;
use App\Setting;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('front.inc.header', function ($view) {
            $view->with('cats', Cat::select('id', 'name')->get());
            $view->with('settings', Setting::select('favicon', 'logo', 'alt_logo', 'name')->first());
        });

        view()->composer('front.inc.footer', function ($view) {
            $view->with('settings', Setting::select('logo', 'name', 'phone', 'email', 'city', 'address', 'fb', 'tw', 'insta')->first());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

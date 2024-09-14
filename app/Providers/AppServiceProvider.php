<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  App\Models\Settings;

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
        //Affichage des paramètres de base dans le footer
        $settings = Settings::where('id', 1)->first();
        view()->share('settings', $settings);
    }
}

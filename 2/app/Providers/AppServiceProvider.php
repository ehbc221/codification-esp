<?php

namespace App\Providers;

use App\CodificationPeriode;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Directive CodificationPeriode
        Blade::if('codificationPeriode', function () {
            return CodificationPeriode::isOpened();
        });

        $controller_name = 'Controller';
        $action_name = 'Action';

        View::share(['controller_name' => $controller_name, 'action_name' => $action_name]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

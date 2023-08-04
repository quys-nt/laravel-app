<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use App\View\Components\Alert;
use App\View\Components\Input\Button;
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
        //
        Blade::directive('datetime', function ($expression) {
            $expression = trim($expression, '\'');
            $expression = trim($expression, '"');
            $dateObject = date_create($expression);
            if (!empty($dateObject)) {
                $dateFomart = $dateObject->format('m/d/Y H:i');
                return $dateFomart;
            }
            return false;
        });

        Blade::component('package-alert', Alert::class);
        Blade::component('button', Button::class);
    }
}

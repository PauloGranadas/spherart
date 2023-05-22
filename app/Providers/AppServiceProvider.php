<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;



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
        //
        Model::unguard();
        //For Google Recaptcha
        Blade::directive('captcha', function () {
            return '<div class="g-recaptcha" data-sitekey="' . config('recaptcha.site_key') . '"></div>';
        });
    }
}

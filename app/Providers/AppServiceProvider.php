<?php

namespace App\Providers;

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
        // Add custom honeypot validation rule
        Validator::extend('honeypot', function ($attribute, $value, $parameters, $validator) {
            // The honeypot field should always be empty
            // If it contains any value, it's likely a bot
            return empty($value);
        });
    }
}

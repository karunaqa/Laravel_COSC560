<?php

namespace App\Providers;

use App\Models\Sanctum\PersonalAccessToken;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
use Laravel\Sanctum\Sanctum;

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
        //class_alias(PersonalAccessToken::class, \Laravel\Sanctum\PersonalAccessToken::class);
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}

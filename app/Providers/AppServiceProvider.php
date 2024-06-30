<?php

namespace App\Providers;

use App\Services\Interface\TrackTikInterface;
use App\Services\TrackTikService;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TrackTikInterface::class,TrackTikService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       // Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
    }
}

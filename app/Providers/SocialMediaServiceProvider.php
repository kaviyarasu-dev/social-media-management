<?php

namespace App\Providers;

use App\Interfaces\SocialMediaInterface;
use App\Services\LinkedInService;
use Illuminate\Support\ServiceProvider;

class SocialMediaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SocialMediaInterface::class, function ($app) {
            if (env('APP_ENV') === 'testing') {
            }
            return new LinkedInService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

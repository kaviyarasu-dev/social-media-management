<?php

namespace App\Providers;

use App\Interfaces\SocialMediaInterface;
use App\Services\FacebookService;
use App\Services\InstagramService;
use App\Services\LinkedInService;
use App\Services\TwitterService;
use Illuminate\Support\ServiceProvider;

class SocialMediaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SocialMediaInterface::class, function ($app, $parameters) {
            if (!isset($parameters['drivers'])) {
                throw new \InvalidArgumentException('Driver not specified.');
            }

            $serviceClasses = [
                'linkedin' => LinkedInService::class,
                'facebook' => FacebookService::class,
                'twitter' => TwitterService::class,
                'instagram' => InstagramService::class,
            ];

            $services = [];
            foreach ($parameters['drivers'] as $driver) {
                if (!isset($serviceClasses[$driver]) || !in_array($driver, config('services.social_media_drivers'))) {
                    throw new \InvalidArgumentException('Invalid driver: ' . $driver);
                }

                $services[] = new $serviceClasses[$driver]();
            }

            return $services;
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

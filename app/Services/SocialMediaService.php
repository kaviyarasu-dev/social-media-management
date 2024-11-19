<?php

namespace App\Services;

use App\Interfaces\SocialMediaInterface;

class SocialMediaService implements SocialMediaInterface
{
    private $services;

    public function __construct(array $services)
    {
        $this->services = $services;
    }

    /**
     * Connect to the social media service and obtain user data.
     *
     * @return array<string, mixed> The user data obtained from the social media service.
     */
    public function connect(): array
    {
        foreach ($this->services as $service) {
            $service->connect();
        }

        return [];
    }
}

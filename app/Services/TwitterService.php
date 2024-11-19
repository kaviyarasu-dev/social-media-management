<?php

namespace App\Services;

use App\Interfaces\SocialMediaInterface;
use Laravel\Socialite\Facades\Socialite;

class TwitterService implements SocialMediaInterface
{
    public function connect(): array
    {
        $user = Socialite::driver('linkedin')->user();

        return [
            'name' => $user->name,
            'token' => $user->token,
            'profile' => $user->attributes['avatar_original'] ?? asset('img/accounts/linkedin.png'),
            'refresh_token' => $user->refreshToken,
            'expired_at' => now()->addSeconds($user->expiresIn),
        ];
    }
}

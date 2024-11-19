<?php

namespace App\Console\Schedule;

use App\Models\UserAccount;
use Illuminate\Console\Command;
use Laravel\Socialite\Facades\Socialite;

class GenerateAccessToken extends Command
{
    /**
     * Execute the console command.
     */
    public function __invoke()
    {
        UserAccount::where('expired_at', '<', now())->each(function (UserAccount $userAccount) {
            $response = Socialite::driver('linkedin')->userFromToken($userAccount->token);
            info('Response: ', [$response]);
            dd($response);

            $newAccessToken = $response['access_token'];
            $userAccount->update([
                'token' => $userAccount->account->generateAccessToken($userAccount->user),
            ]);
        });
    }
}

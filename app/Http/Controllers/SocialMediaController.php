<?php

namespace App\Http\Controllers;

use App\Interfaces\SocialMediaInterface;
use App\Models\Account;
use App\Models\UserAccount;
use App\Services\SocialMedia;
use App\Services\SocialMediaService;
use Laravel\Socialite\Facades\Socialite;

class SocialMediaController extends Controller
{
    /**
     * Redirect the user to the authentication page for the given driver.
     *
     * @param string $driverName The slug of the social media driver.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect(string $driverName)
    {
        return Socialite::driver($driverName)->redirect();
    }

    /**
     * Handle the callback from the social media provider.
     *
     * This method retrieves the account based on the provided driver name,
     * connects to the social media service to obtain user data, and updates
     * or creates a UserAccount record with the response. Finally, it redirects
     * the user to the dashboard.
     *
     * @param string $driverName The slug of the social media driver.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(string $driverName)
    {
        $account = Account::where('slug', $driverName)->firstOrFail();
        $services = (array) app(SocialMediaInterface::class, ['drivers' => [$driverName]]);

        (new SocialMediaService($services))->connect();
        foreach ($services as $service) {
            $response = $service->connect();

            UserAccount::updateOrCreate(['user_id' => auth('web')->id(), 'account_id' => $account->id], $response);
        }

        return to_route('dashboard');
    }
}

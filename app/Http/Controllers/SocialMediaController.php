<?php

namespace App\Http\Controllers;

use App\Interfaces\SocialMediaInterface;
use App\Models\Account;
use App\Models\UserAccount;
use Laravel\Socialite\Facades\Socialite;

class SocialMediaController extends Controller
{

    public function __construct(public SocialMediaInterface $socialMediaInterface) {}

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
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function callback(string $driverName)
    {
        $account = Account::where('slug', $driverName)->firstOrFail();

        $response = $this->socialMediaInterface->connect();

        UserAccount::updateOrCreate(['user_id' => auth()->id(), 'account_id' => $account->id], $response);

        return to_route('dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\UserAccount;

class DashboardController extends Controller
{
    public function index()
    {
        $myAccounts = UserAccount::where('user_id', auth('web')->id())->get();
        $accounts = Account::whereNotIn('id', $myAccounts->pluck('account_id'))->get();
        $accounts = Account::get();

        return view('dashboard', compact('accounts', 'myAccounts'));
    }
}

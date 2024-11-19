<?php

use App\Console\Schedule\GenerateAccessToken;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', fn()  => $this->comment(Inspiring::quote()))
    ->purpose('Display an inspiring quote')
    ->hourly();

Schedule::call(new GenerateAccessToken())->everyMinute();

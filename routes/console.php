<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command(
    'password:reset {userld} {--sendEmail}',
    function ($userld, $sendEmail) {
        $userld = $this->argument('userld');
        // some code
    }
);

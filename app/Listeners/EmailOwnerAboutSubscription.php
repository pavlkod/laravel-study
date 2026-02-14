<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Mail\AssignmentCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailOwnerAboutSubscription
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserSubscribed $event): void
    {
        //
        Log::info('Emailed owner about new user: ' . $event->user->email);
        Mail::to(config('app.owner-email'))
            ->send(new AssignmentCreated($event->user, $event->plan));
    }
}

<?php

namespace App\Listeners;

class UserEventSubscriber
{
   public function onUserSubscription($event)
    {
        // Обрабатывает событие UserSubscribed
    }
    public function onUserCancellation($event)
    {
        // Обрабатывает событие UserCanceled
    }
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\UserSubscribed::class,
            'App\Listeners\UserEventSubscriber@onUserSubscription'
        );
        $events->listen(
            \App\Events\UserCanceled::class,
            'App\Listeners\UserEventSubscriber@onUserCancellation'
        );
    }
}

<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Events\UserLogedin;
use App\Jobs\SendEmailJob;

class OrderSubscriber
{
    /**
     * Handle user login events.
     */
    public function handleUserLogin($event) {
        SendEmailJob::dispatch();
    }

    /**
     * Handle user logout events.
     */
    public function handleUserLogout($event) {
        SendEmailJob::dispatch();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen(
            UserLogedin::class,
            [OrderSubscriber::class, 'handleUserLogin']
        );

        $events->listen(
            OrderCreated::class,
            [OrderSubscriber::class, 'handleUserLogout']
        );
    }
}

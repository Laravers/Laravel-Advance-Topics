<?php

namespace App\Providers;

use App\Events\OrderCreated;
use App\Events\UserLogedin;
use App\Listeners\KajHoice;
use App\Listeners\OrderCreatedNotification;
use App\Listeners\OrderSubscriber;
use App\Models\User;
use App\Notifications\TestMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use function Illuminate\Events\queueable;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        // tesing custom event and listener

        // OrderCreated::class => [
        //     OrderCreatedNotification::class,
        //     KajHoice::class,
        // ],
        // UserLogedin::class => [
        // ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // testing custom event and listener without listener class

        // Event::listen(queueable(function (OrderCreated $event) {
        //     $user = User::first();
        //     $user->notify(new TestMail());
        // }));
    }

    protected $subscribe = [
        OrderSubscriber::class
    ];
}

<?php

namespace App\Providers;

use App\Events\FinishExamEvent;
use App\Events\SMSVerificationEvent;
use App\Events\UserProfileCreatedEvent;
use App\Events\UserProfileUpdatedEvent;
use App\Listeners\FinishAndCalculateExamListener;
use App\Listeners\SendSMSToCreatedUserListener;
use App\Listeners\SendSMSToUpdatedUserListener;
use App\Listeners\SendSMSVerificationListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SMSVerificationEvent::class => [
            SendSMSVerificationListener::class,
        ],
        UserProfileCreatedEvent::class => [
            SendSMSToCreatedUserListener::class,
        ],
        FinishExamEvent::class => [
            FinishAndCalculateExamListener::class,
        ],
        UserProfileUpdatedEvent::class => [
            SendSMSToUpdatedUserListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}

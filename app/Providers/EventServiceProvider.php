<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use OwenIt\Auditing\Events\Audited;
use App\Listeners\AuditNotificationListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Audited::class => [
            AuditNotificationListener::class,
        ],
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}


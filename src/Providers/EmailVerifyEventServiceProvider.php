<?php

namespace Meness\Verifi\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Meness\Verifi\Listeners\SendEmailVerifyMail;

/**
 * Class EmailVerifyEventServiceProvider
 * @package Meness\Verifi\Providers
 */
class EmailVerifyEventServiceProvider extends EventServiceProvider {

    /**
     * The event listener mappings for the application.
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerifyMail::class,
        ],
    ];

    /**
     * Register any other events for your application.
     * @return void
     */
    public function boot() {

        parent::boot();
        //
    }
}
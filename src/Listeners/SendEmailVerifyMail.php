<?php

namespace Meness\Verifi\Listeners;

use Illuminate\Auth\Events\Registered;
use Meness\Verifi\Verifi;

/**
 * Class SendEmailVerifyMail
 * @package Meness\Verifi\Listeners
 */
class SendEmailVerifyMail {

    /**
     * Create the event listener.
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered $event
     *
     * @return void
     */
    public function handle(Registered $event) {

        if (config('verifi.send_notifications', true)) {
            resolve(Verifi::class)->resend($event->user);
        }
    }
}

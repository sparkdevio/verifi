<?php

return [
    /**
     * Time in minutes, until the verification email link expires.
     * Defaults to 24h.
     */
    'expiration'         => 1440,
    /**
     * Your desired verify route.
     */
    'verify_route'       => '/verify',
    /**
     * Send the verify email notification automatically while users are registered.
     * Defaults to true.
     */
    'send_notifications' => true,
];
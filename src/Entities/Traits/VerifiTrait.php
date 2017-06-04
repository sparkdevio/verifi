<?php

namespace Meness\Verifi\Entities\Traits;

use Meness\Verifi\Notifications\VerifyEmailNotification;

/**
 * Trait Verifi
 * @package Meness\Verifi\Entities\Traits
 */
trait VerifiTrait {

    /**
     * @param $token
     * @param $expiration
     */
    public function sendEmailVerifyNotification($token, $expiration) {

        $this->notify(new VerifyEmailNotification($token, $expiration));
    }
}
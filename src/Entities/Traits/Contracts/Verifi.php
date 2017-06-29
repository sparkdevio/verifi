<?php

namespace Meness\Verifi\Entities\Traits\Contracts;

/**
 * Interface Verifi
 * @package Meness\Verifi\Entities\Traits\Contracts
 */
interface Verifi {

    /**
     * Get the user's email address
     * @return string
     */
    public function getEmailForEmailVerify();

    /**
     * Get the user's password
     * @return mixed
     */
    public function getPassword();

    /**
     * Determine whether the user is verified or not.
     * @return boolean
     */
    public function isEmailVerified();

    /**
     * Send the user a notification.
     *
     * @param $token
     * @param $expiration
     */
    public function sendEmailVerifyNotification($token, $expiration);
}
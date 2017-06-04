<?php

namespace Meness\Verifi\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Class VerificationSent
 * @package Meness\Verifi\Events
 */
class VerificationSent {

    use SerializesModels;

    /**
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $user;

    /**
     * VerificationSent constructor.
     *
     * @param $user
     */
    public function __construct($user) {

        $this->user = $user;
    }
}
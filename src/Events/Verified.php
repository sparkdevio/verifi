<?php

namespace Meness\Verifi\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Class Verified
 * @package Meness\Verifi\Events
 */
class Verified {

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
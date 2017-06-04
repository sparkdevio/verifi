<?php

namespace Meness\Verifi\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Class InvalidCredentials
 * @package Meness\Verifi\Events
 */
class InvalidCredentials {

    use SerializesModels;

    /**
     * @var \Illuminate\Contracts\Validation\Validator|null
     */
    public $validator;

    /**
     * VerificationSent constructor.
     *
     * @param \Illuminate\Contracts\Validation\Validator|null $validator
     */
    public function __construct($validator) {

        $this->validator = $validator;
    }
}
<?php

namespace Meness\Verifi\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;

/**
 * Class UserNotVerifiedException
 * @package Meness\Verifi\Exceptions
 */
class UserNotVerifiedException extends AuthorizationException {

    /**
     * The exception description.
     * @var string
     */
    protected $message = 'This user\'s email address is not verified.';
}
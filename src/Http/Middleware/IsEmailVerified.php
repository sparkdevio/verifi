<?php

namespace Meness\Verifi\Http\Middleware;

use Closure;
use Meness\Verifi\Exceptions\UserNotVerifiedException;

/**
 * Class IsEmailVerified
 * @package Meness\Verifi\Http\Middleware
 */
class IsEmailVerified {

    /**
     * @param \Illuminate\Http\Request $request
     * @param Closure                  $next
     * @param  string|null $guard
     *
     * @return mixed
     * @throws \Meness\Verifi\Exceptions\UserNotVerifiedException
     */
    public function handle($request, Closure $next, $guard = null) {

        if (!is_null($request->user($guard)) && !$request->user($guard)->isEmailVerified()) {
            throw new UserNotVerifiedException();
        }

        return $next($request);
    }
}

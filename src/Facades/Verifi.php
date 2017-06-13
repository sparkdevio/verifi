<?php

namespace Meness\Verifi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Verifi
 * @method static void resend(\Meness\Verifi\Entities\Traits\Contracts\Verifi | \Illuminate\Notifications\Notifiable $user, $callback = null)
 * @method static void verify(\Illuminate\Http\Request $request, $callback = null)
 * @package Meness\Verifi\Facades
 */
class Verifi extends Facade {

    /**
     * Get the registered name of the component.
     * @return string
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor() {

        return 'verifi';
    }

}
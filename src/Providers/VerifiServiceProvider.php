<?php

namespace Meness\Verifi\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Meness\Verifi\Verifi;

/**
 * Class VerifiServiceProvider
 * @package Meness\Verifi\Providers
 */
class VerifiServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     * @return void
     */
    public function boot() {

        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'verifi');
        $this->publishes([
            __DIR__ . '/../../config/config.php' => config_path('verifi.php'),
        ], 'config');

        if (!class_exists('AddIsEmailVerifiedColumnToUsersTable')) {
            $this->publishes([
                __DIR__ . '/../../database/migrations/add_is_email_verified_column_to_users_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_add_is_email_verified_column_to_users_table.php'),
            ], 'migrations');
        }
    }

    /**
     * Register the application services.
     * @return void
     */
    public function register() {

        $this->app->register(EmailVerifyEventServiceProvider::class);
        $this->app->singleton(Verifi::class, function () {

            return new Verifi(Auth::guard('web')->getProvider(), Auth::guard('web')->getDispatcher(), config('app.key'), config('verifi.expiration', 1440));
        });
        $this->app->alias(Verifi::class, 'verifi');
    }
}

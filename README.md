# Laravel Verifi
[![Travis](https://img.shields.io/travis/meness/verifi.svg)](https://travis-ci.org/meness/verifi)
[![Packagist](https://img.shields.io/packagist/dt/meness/verifi.svg)](https://packagist.org/packages/meness/verifi)
[![Packagist](https://img.shields.io/packagist/v/meness/verifi.svg)](https://packagist.org/packages/meness/verifi)
[![Packagist](https://img.shields.io/packagist/l/meness/verifi.svg)](https://packagist.org/packages/meness/verifi)

A Laravel package to handle email verification.

It is inspired by [crypto-based password resets](https://github.com/laravel/framework/pull/17499) and the [email verification package by josiasmontag](https://github.com/josiasmontag/laravel-email-verification).

- Crypto-based email verification. No need to store a temporary token in the database!
- Event-based totally. No need to override your `register()` method.
- Using the Laravel 5.4 notification system.
- You're free to create routes anyway you like.
- Resend the verification email anytime.
- Customize the email notification.

## Installation

Install this package via Composer.
```
composer require meness/verifi
```

You must install both the service provider and the facade.

```php
'providers' => [
    ...
    Meness\Verifi\Providers\VerifiServiceProvider::class,
];

'aliases' => [
    ...
    'Verifi' => Meness\Verifi\Facades\Verifi::class,
];
```

A migration is provided to add a `is_email_verified` column to the existing `users` table, you can publish the migration.

```
php artisan vendor:publish --provider="Meness\Verifi\Providers\VerifiServiceProvider" --tag="migrations"
```

Remember to run the following command if you published the migration.

```
php artisan migrate
```

A configuration file is also provided, you can publish the configuration.

```
php artisan vendor:publish --provider="Meness\Verifi\Providers\VerifiServiceProvider" --tag="config"
```

## Configuration

### `expiration`

`1440` (in minutes, 24 hours) set by default.

### `verify_route`

`/verify` set by default. Change the value if you're using a different route for verification.

### `send_notifications`

`true` set by default. Let this package send an email notification automatically after the registration complete.

## How to Use (Step by Step)

### Step One

1. The `User` model must implement `Meness\Verifi\Entities\Traits\Contracts\Verifi` interface.

2. Add `Meness\Verifi\Entities\Traits\VerifiTrait` as a trait if you're going to use the default notification.

```php
class User extends Authenticatable implements Verifi
{
    use Notifiable, VerifiTrait;
}
```

**Note:** Some methods are not implemented, you must do it yourself.

### Step Two

You're free to create routes, because there're no default routes provided with this package.

```php
Route::get('/verify', 'Auth\RegisterController@verify');
Route::get('/resend', 'Auth\RegisterController@resend');
```

**Note:** Remember to change the `verify_route` value if you're not going to use the default route.

### Step Three (Optional)

Create listeners for necessary events. There're three events provided with this package: `InvalidCredentials`, `VerificationSent`, and `Verified`.

### Step Four

There're two methods available, `verify()` and `resend()`.

**Note:** An email verification will be sent after the registration complete if `send_notifications`  set `true`, so you're not required to do it manually.

#### `verify()`

`Verifi::verify()` expects a request object and an optional callback. It verifies credentials provided with the request.

```php
Verifi::verify(request(), function ($user) {

	if (is_null($user)) {
		// Invalid credentials provided
	} else {
		// Verified
	}
});
```

#### `resend()`

`Verifi::resend()` expects an user model object and an optional callback. It sends the verification email to the provided user.

```php
Verifi::resend($user, function ($user) {
	// Resent successfully
});
```

### Step Five (Optional)

There's a middleware called `IsEmailVerified` to determine if the user's email address is verified.

```php
$routeMiddleware = [
    ...
    'isEmailVerified' => \Meness\Verifi\Http\Middleware\IsEmailVerified::class,
];
```

## Changelog

Please see [releases](https://github.com/meness/verifi/releases) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

* [Alireza Eskandarpour Shoferi](https://about.me/meness)
* [Contributors](https://github.com/meness/verifi/graphs/contributors)

## License
Verifi is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

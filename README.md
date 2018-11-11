# Laravel Croustillon

A package to help you manage your cookie banner and cookie policy with ease.

> Documentation is still a work in progress.

## Installation

```bash
composer require elhebert/laravel-croustillon
```

This package uses [auto-discovery](https://laravel.com/docs/packages#package-discovery), so you don't have to do anything.

You can publish the config-file with:

```bash
php artisan vendor:publish --provider="Elhebert\Croustillon\CroustillonServiceProvider" --tag="croustillon-config"
```

You can publish the language-file with:

```bash
php artisan vendor:publish --provider="Elhebert\Croustillon\CroustillonServiceProvider" --tag="croustillon-translations"
```

You can publish the view-files with:

```bash
php artisan vendor:publish --provider="Elhebert\Croustillon\CroustillonServiceProvider" --tag="croustillon-views"
```

You can add a cookie banner to all responses of your app by registering `Elhebert\Croustillon\Http\Middlewares\AddCookieBanner::class` in the http kernel.
```php
// app/Http/Kernel.php

...

protected $middlewareGroups = [
   'web' => [
       ...
       \Elhebert\Croustillon\Http\Middlewares\AddCookieBanner::class,
   ],
```

Alternatively you can apply the middleware on the route or route group level.

```php
// in a routes file

Route::get('my-page', 'MyController')->middleware(Elhebert\Croustillon\Http\Middlewares\AddCookieBanner::class);
```

## Usage

W.I.P.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for more details.

## License

This project and the Laravel framework are open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

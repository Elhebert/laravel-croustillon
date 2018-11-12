# Laravel Croustillon

A package to help you manage your cookie banner and cookie policy with ease.

> Documentation is still a work in progress.

## Why `laravel-croustillon`?

I'm glad you asked. During the develoment of this packages I used `Cookie` to namespace everything which quickly made it hard to dicerne the Laravel Cookie classes and the Cookie from my package.

I start thinking about names to use and thought of names like Donuts, Cake, Waffle or Biscuit. I discussed this with a colleague ([@meduzen](https://github.com/meduzen)) and I joked about using `Croustillon` because it would make everything awesome.

Croustillon is a (french) Belgian word. For the non belgian people out here, Google Translate tells me it's called a donut in english, but I'm sceptical.

So here's a picture:

![croustillon](http://www.lesfoodies.com/_recipeimage/98339/beignet-croustillon.jpg)

## Disclaimer

I'm not a lawyer, so everything here should be taken with a grain of salt, especially the legal documents.

Therefor I decline all responsability for any legal issues you might encounter by using this package without checking the legal documents with a lawyer.

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

This package allows you to define a cookie policy. A cookie policy determines which cookies are used within your website and generate a corresponding banner and legal page.

By default every Laravel application has 2 cookies set, the `laravel_session` cookie and the `XSRF-TOKEN` cookie. Using a new Laravel application as example, here what you can expect:

```php
// in a policy

...
    ->addCookie(Xsrf::class)
    ->addCookie(Session::class)
...
```

### Creating a cookie

As we all know website are not limited to use the default cookies and might use new ones for all kind of reasons. Which is why you can create custom cookies to add to a policy.

A cookie is compose of a name, a description, a duration, a purpose, a source and a category.

```php
namespace Elhebert\Croustillon\Cookies;

use Elhebert\Croustillon\Categories\Mandatory;

class Xsrf extends Cookie
{
    public $name = 'XSRF-TOKEN';

    public $category = Mandatory::class;

    public $source = 'Laravel';

    public $duration = '2 hours';

    public $purpose = 'security';
}
```

This package comes with pre-defined categories from which you can choose from:

```php
Elhebert\Croustillon\Categories\Mandatory::class
Elhebert\Croustillon\Categories\Preferences::class
Elhebert\Croustillon\Categories\Analytics::class
Elhebert\Croustillon\Categories\Social::class
Elhebert\Croustillon\Categories\Retargetting::class
```

Depending on which cookies you added to your policy, it'll impact the cookie banner and the legal page.
The banner will add checkboxes for each categories of cookies (to offer fully granularity to the visitor) and the legal page will add the cookies and corresponding categories to the list of cookies.

If you need to customize the different variables you can use the corresponding functions instead of the variable:

```php
public function duration(): string
{
    return config('session.lifetime') . ' minutes';
}

public function purpose(): string
{
    return trans('croustillon::cookies.purposes.security');
}
```

### Creatiing a policy

Once you have all your cookies, you need to create a new policy:

```php
namespace App\Service\Croustillon\Policies;

use Elhebert\Croustillon\Policies\Basic;
use App\Service\Croustillon\Cookie\MyCustomCookie;

class MyCustomPolicy extends Basic
{
    public function configure()
    {
        parent::configure();

        $this
            ->addCookie(MyCustomCookie::class);
    }
}
```

Don't forget to update the `policy` key of the config file to the class of your policy (in this case it would be `App\Service\Croustillon\Policies\MyCustomPolicy`).

### Customising the cookie banner and the legal page

This package comes with a default cookie banner and legal page that you can (and should) customize, to do so you need to publish the package views:

```bash
php artisan vendor:publish --provider="Elhebert\Croustillon\CroustillonServiceProvider" --tag="croustillon-views"
```

#### Cookie banner

The banner will be in `resources/views/vendor/croustillon/banner.blade.php`. By default it's generating the checkboxes for every cookie categories present in your policy. The mandatory category will be checked and disable (because it's _mandatory_).

It also comes bundle with a controller and a route, so you don't need to worry about creating them in your application.

The default route is `/croustillon`.

#### Cookie legal page

The legal page can be found in `resources/views/vendor/croustillon/policy.blade.php`. The main content of that page is already done, but you still should update it to suit your need and your website.

The default route for this page is `/croustillon/policy`.

## Customization

This package come with opinions. Like routes, copy and views.

Everything can be customize.

### Routes

The prefix can be customize in the config file but should you need complete control on the routes you can disable the ones from this package to create your own.

The routes you need to create are:

- For the cookie banner form:
    - Verb: `POST`
    - Action: `\Elhebert\Croustillon\Http\Controllers\CookiesController` (it has an `__invoke` method, so you don't need to reference a method).

- For the cookie policy legal page:
    - Verb: `GET`
    - Action: `\Elhebert\Croustillon\Http\Controllers\CookiePolicyController` (it has an `__invoke` method, so you don't need to reference a method).

### Translations

You can overwrite the default translations by publishing the language files.

### Views

You can overwrite the default views by publishing the view files.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for more details.

## License

This project and the Laravel framework are open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

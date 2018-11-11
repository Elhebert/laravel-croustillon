<?php

namespace Elhebert\Croustillon;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CroustillonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Route::middlewareGroup('croustillon', config('croustillon.middleware', []));

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'croustillon');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'croustillon');

        $this->registerPublishing();
        $this->registerRoutes();

        $this->registerViewComposer();

        $this->app->bind(Croustillon::class, function () {
            $Croustillon = new Croustillon();
            $Croustillon->registerNewPolicy();

            return $Croustillon;
        });

        $this->app->alias(Croustillon::class, 'croustillon');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/croustillon.php', 'croustillon');
    }

    private function registerPublishing()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/croustillon'),
        ], 'croustillon-views');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/croustillon'),
        ], 'croustillon-translations');

        $this->publishes([
            __DIR__ . '/../config/croustillon.php' => config_path('croustillon.php'),
        ], 'croustillon-config');
    }

    private function registerRoutes()
    {
        Route::prefix(config('croustillon.path'))
            ->namespace('Elhebert\Croustillon\Http\Controllers')
            ->middleware('croustillon')
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
            });
    }

    private function registerViewComposer()
    {
        View::composer([
            'croustillon::_partials.categories.*',
        ], function ($view) {
            $view->with('locale', app()->getLocale());
        });
    }
}

<?php

namespace Mlatjac\FrEn;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Mlatjac\FrEn\Http\Middleware\Language;

class FrEnServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'mlatjac');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'mlatjac');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Let routes use the our middleware with the lang alias
        $router->aliasMiddleware('lang', Language::class);

        // Include the Language Middleware in all web routes
        $router->pushMiddlewareToGroup('web', Language::class);

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/fren.php', 'fren');

        // Register the service the package provides.
        $this->app->singleton('fren', function ($app) {
            return new FrEn;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['fren'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/fren.php' => config_path('fren.php'),
        ], 'fren.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/mlatjac'),
        ], 'fren.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/mlatjac'),
        ], 'fren.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/mlatjac'),
        ], 'fren.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}

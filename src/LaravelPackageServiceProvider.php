<?php

namespace Myopentrip\LaravelPackage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class LaravelPackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-server-analytics');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-server-analytics');
        // $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        // $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-package.php' => config_path('laravel-package.php')
            ], 'laravel-package-config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-package-boilerplate'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-package-boilerplate'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-package-boilerplate'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom($this->removeLeftDir(), 'laravel-package');

        $this->app->singleton('laravel-package', function(){
            return new LaravelPackage;
        });
    }

    private function removeLeftDir(String $pathConfig = '/config/laravel-package.php') : String
    {
        $result = Str::replace('/src', '', __DIR__);
        return $result . $pathConfig;
    }
}
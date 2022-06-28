<?php

namespace AndyParinas\LaravelPackageExample;

use AndyParinas\LaravelPackageExample\Commands\LaravelPackageExampleCommand;
use AndyParinas\LaravelPackageExample\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelPackageExampleServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-package-example')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_my_models_table')
            ->hasCommand(LaravelPackageExampleCommand::class);
    }

    public function packageRegistered()
    {
        // Route::get('my-route', [MyController::class, 'index']);
        /**
         * To have a customizable Route, we will be using the Macro
         *
         * This can be customize by Route::example  = /example
         * or Route::example('my-example) = /my-example
         *
         */

        Route::macro('example', function (string $baseUrl = 'example') {
            Route::prefix($baseUrl)->group(function () {
                Route::get('/', [MyController::class, 'index']);
            });
        });
    }
}

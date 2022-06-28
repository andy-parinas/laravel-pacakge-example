<?php

namespace AndyParinas\LaravelPackageExample\Tests;

use AndyParinas\LaravelPackageExample\LaravelPackageExampleServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'AndyParinas\\LaravelPackageExample\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );

        Route::example();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelPackageExampleServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');


        $migration = include __DIR__.'/../database/migrations/create_my_models_table.php.stub';
        $migration->up();
    }
}

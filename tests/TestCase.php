<?php

namespace AndyParinas\LaravelPackageExample\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use AndyParinas\LaravelPackageExample\LaravelPackageExampleServiceProvider;
use Illuminate\Support\Facades\Route;

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

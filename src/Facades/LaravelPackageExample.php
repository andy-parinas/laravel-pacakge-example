<?php

namespace AndyParinas\LaravelPackageExample\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AndyParinas\LaravelPackageExample\LaravelPackageExample
 */
class LaravelPackageExample extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-package-example';
    }
}

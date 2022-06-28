<?php

use AndyParinas\LaravelPackageExample\Commands\LaravelPackageExampleCommand;
use Illuminate\Console\Command;

use function Pest\Laravel\artisan;

it('can test', function () {
    // expect(true)->toBeTrue();
    artisan(LaravelPackageExampleCommand::class)->assertExitCode(Command::SUCCESS);
});

it('can output configured value', function () {
    artisan(LaravelPackageExampleCommand::class)->expectsOutput(config('package-example.command_output'));
});

it('can output another value', function () {
    config()->set('package-example.command_output', 'something else');

    artisan(LaravelPackageExampleCommand::class)->expectsOutput('something else');
});

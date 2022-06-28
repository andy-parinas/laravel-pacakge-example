<?php

namespace AndyParinas\LaravelPackageExample\Commands;

use Illuminate\Console\Command;

class LaravelPackageExampleCommand extends Command
{
    public $signature = 'my-command';

    public $description = 'My command';

    public function handle(): int
    {
        // dd("here");
        $output = config("package-example.command_output");

        $this->comment($output);

        return self::SUCCESS;
    }
}

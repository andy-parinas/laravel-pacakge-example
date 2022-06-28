<?php

use AndyParinas\LaravelPackageExample\Http\Controllers\MyController;

it('has a route', function () {

    // $this->get('my-route')
    //     ->assertOk()
    //     ->assertSee('OK!');

    $this->get(action([MyController::class, 'index']))
        ->assertOk()
        ->assertSee('Hello from Package View');
});

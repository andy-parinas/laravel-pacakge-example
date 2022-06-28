<?php

use AndyParinas\LaravelPackageExample\Models\MyModel;

it('can create model', function () {
    $myModel = MyModel::factory()->create();

    $this->assertModelExists($myModel);
});

it('can return uppercase name', function () {

    /** @var MyModel $myModel */
    $myModel = MyModel::factory()->create(['name' => 'John']);

    $this->assertModelExists($myModel);

    expect($myModel->uppercaseName)->toEqual('JOHN');
});

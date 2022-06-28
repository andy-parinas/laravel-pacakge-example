<?php

namespace AndyParinas\LaravelPackageExample\Http\Controllers;

class MyController
{
    public function index()
    {
        // return 'OK!';
        return view('package-example::packageView');
    }
}

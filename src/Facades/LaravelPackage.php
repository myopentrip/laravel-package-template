<?php

namespace Myopentrip\LaravelPackage\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelPackage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-package';
    }
}
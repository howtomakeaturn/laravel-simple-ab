<?php

namespace Howtomakeaturn\LaravelSimpleAB;

use Illuminate\Support\Facades\Facade;

class LaravelSimpleABFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-simple-ab';
    }
}

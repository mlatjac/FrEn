<?php

namespace Mlatjac\FrEn\Facades;

use Illuminate\Support\Facades\Facade;

class FrEn extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'fren';
    }
}

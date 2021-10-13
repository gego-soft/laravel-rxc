<?php

namespace Gegosoft\Rxccoin\Facades;

use Illuminate\Support\Facades\Facade;

class Rxccoind extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rxccoind';
    }
}

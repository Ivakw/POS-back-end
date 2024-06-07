<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class StockServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Services\StockService::class;
    }
}

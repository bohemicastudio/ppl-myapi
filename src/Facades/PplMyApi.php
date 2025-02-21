<?php

namespace BohemicaStudio\PplMyApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BohemicaStudio\PplMyApi\PplMyApi
 */
class PplMyApi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \BohemicaStudio\PplMyApi\PplMyApi::class;
    }
}

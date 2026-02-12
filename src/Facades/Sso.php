<?php

namespace Imv\Sso\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Imv\Sso\Sso
 */
class Sso extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Imv\Sso\Sso::class;
    }
}

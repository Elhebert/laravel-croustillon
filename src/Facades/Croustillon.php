<?php

namespace Elhebert\Croustillon\Facades;

class Croustillon extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'croustillon';
    }
}

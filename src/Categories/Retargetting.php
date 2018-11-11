<?php

namespace Elhebert\Croustillon\Categories;

class Retargetting extends CookieCategory
{
    /** @var int */
    protected $value = 16;

    public function description(): string
    {
        return view('croustillon::_partials.categories.retargetting')->render();
    }

    public function name(): string
    {
        return trans('croustillon::cookies.categories.retargetting');
    }
}

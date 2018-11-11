<?php

namespace Elhebert\Croustillon\Categories;

class Preferences extends CookieCategory
{
    /** @var int */
    protected $value = 2;

    public function description(): string
    {
        return view('croustillon::_partials.categories.preferences')->render();
    }

    public function name(): string
    {
        return trans('croustillon::cookies.categories.preferences');
    }
}

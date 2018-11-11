<?php

namespace Elhebert\Croustillon\Categories;

class Analytics extends CookieCategory
{
    /** @var int */
    protected $value = 4;

    public function description(): string
    {
        return view('croustillon::_partials.categories.analytics')->render();
    }

    public function name(): string
    {
        return trans('croustillon::cookies.categories.analytics');
    }
}

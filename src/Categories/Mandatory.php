<?php

namespace Elhebert\Croustillon\Categories;

class Mandatory extends CookieCategory
{
    /** @var int */
    protected $value = 1;

    /** @var bool */
    public $mandatory = true;

    public function description(): string
    {
        return view('croustillon::_partials.categories.mandatory')->render();
    }

    public function name(): string
    {
        return trans('croustillon::cookies.categories.mandatory.name');
    }
}

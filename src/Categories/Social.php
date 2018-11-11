<?php

namespace Elhebert\Croustillon\Categories;

class Social extends CookieCategory
{
    /** @var int */
    protected $value = 8;

    public function description(): string
    {
        return view('croustillon::_partials.categories.social')->render();
    }

    public function name(): string
    {
        return trans('croustillon::cookies.categories.social.name');
    }
}

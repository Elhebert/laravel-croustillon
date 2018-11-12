<?php

namespace Elhebert\Croustillon\Cookies;

use Elhebert\Croustillon\Categories\Mandatory;

class Xsrf extends Cookie
{
    /** @var string */
    public $name = 'XSRF-TOKEN';

    /** @var string */
    public $category = Mandatory::class;

    /** @var string */
    public $source = 'Laravel';

    public function duration(): string
    {
        return config('session.lifetime') . ' minutes';
    }

    public function purpose(): string
    {
        return trans('croustillon::cookies.purposes.security');
    }
}

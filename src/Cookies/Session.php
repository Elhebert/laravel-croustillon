<?php

namespace Elhebert\Croustillon\Cookies;

use Elhebert\Croustillon\Categories\Mandatory;

class Session extends Cookie
{
    /** @var string */
    public $category = Mandatory::class;

    /** @var string */
    public $source = 'Laravel';

    public function name(): string
    {
        return config('session.cookie');
    }

    public function duration(): string
    {
        return config('session.lifetime') . ' minutes';
    }

    public function purpose(): string
    {
        return __('croustillon::cookies.purposes.security');
    }
}

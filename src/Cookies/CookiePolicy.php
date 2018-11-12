<?php

namespace Elhebert\Croustillon\Cookies;

use Elhebert\Croustillon\Categories\Mandatory;

class CookiePolicy extends Cookie
{
    /** @var string */
    public $duration = '2 months';

    /** @var string */
    public $category = Mandatory::class;

    /** @var string */
    public $source = 'Laravel';

    public function name(): string
    {
        return config('croustillon.policy_cookie');
    }

    public function purpose(): string
    {
        return trans('croustillon::cookies.purposes.cookie-preferences');
    }
}

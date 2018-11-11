<?php

namespace Elhebert\Croustillon\Policies;

use Elhebert\Croustillon\Cookies\Xsrf;
use Elhebert\Croustillon\Cookies\Session;
use Elhebert\Croustillon\Cookies\CookiePolicy;

class Basic extends Policy
{
    public function configure()
    {
        $this
            ->addCookie(CookiePolicy::class)
            ->addCookie(Xsrf::class)
            ->addCookie(Session::class);
    }
}

<?php

namespace Elhebert\Croustillon\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Elhebert\Croustillon\Traits\SetCookiePolicy;

class CookiesController
{
    use SetCookiePolicy;

    public function __invoke(Request $request): RedirectResponse
    {
        return $this->setCookie($request);
    }
}

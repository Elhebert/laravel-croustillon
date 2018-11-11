<?php

namespace Elhebert\Croustillon\Http\Controllers;

use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Elhebert\Croustillon\Facades\Croustillon;
use Elhebert\Croustillon\Cookies\CookiePolicy;

class CookiesController
{
    public function store(Request $request): RedirectResponse
    {
        $selectedCookiePolicy = collect($request->input('cookie-choice'))
            ->reduce(function ($carry, $item) {
                return $carry + $item;
            });

        $cookiePolicy = Croustillon::minimumCookiePolicy() + $selectedCookiePolicy;
        $cookiePolicyCookie = Croustillon::cookies()[
            Croustillon::cookies()->search(function ($item) {
                return $item instanceof CookiePolicy;
            })
        ];

        return back()->withCookie(
            $cookiePolicyCookie->name(),
            $cookiePolicy,
            CarbonInterval::fromString($cookiePolicyCookie->duration())->total('minutes')
        );
    }
}

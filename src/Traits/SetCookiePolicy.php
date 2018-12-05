<?php

namespace Elhebert\Croustillon\Traits;

use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Elhebert\Croustillon\Facades\Croustillon;
use Elhebert\Croustillon\Cookies\CookiePolicy;

trait SetCookiePolicy
{
    public function setCookie(Request $request): RedirectResponse
    {
        $selectedCookiePolicy = collect($request->input('cookie-choice'))
            ->reject(function ($choice) {
                return Croustillon::mandatoryCategories()
                    ->map(function ($category) {
                        return $category->value();
                    })
                    ->contains($choice);
            })
            ->sum();

        $cookiePolicy = Croustillon::minimumCookiePolicy() + $selectedCookiePolicy;
        $cookiePolicyCookie = Croustillon::cookies()[Croustillon::cookies()->search(function ($item) {
            return $item instanceof CookiePolicy;
        })];

        $this->beforeSettingCookie($cookiePolicy, $cookiePolicyCookie);

        return back()->withCookie(
            $cookiePolicyCookie->name(),
            $cookiePolicy,
            CarbonInterval::fromString($cookiePolicyCookie->duration())->total('minutes')
        );
    }

    public function beforeSettingCookie(int $cookiePolicy, CookiePolicy $cookiePolicyCookie)
    {
    }
}

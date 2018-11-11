<?php

namespace Elhebert\Croustillon\Http\Controllers;

use Illuminate\View\View;

class CookiePolicyController
{
    public function __invoke(): View
    {
        return view('croustillon::policy');
    }
}

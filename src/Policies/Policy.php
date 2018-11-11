<?php

namespace Elhebert\Croustillon\Policies;

use Elhebert\Croustillon\Traits\HasCookies;

abstract class Policy
{
    use HasCookies;

    abstract public function configure();
}

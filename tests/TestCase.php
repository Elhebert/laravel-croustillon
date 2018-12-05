<?php

namespace Elhebert\Croustillon\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Elhebert\Croustillon\CroustillonServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            CroustillonServiceProvider::class,
        ];
    }
}

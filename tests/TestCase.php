<?php

namespace Tests;

use MLL\LaravelQueryLog\LaravelQueryLogServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelQueryLogServiceProvider::class,
        ];
    }
}

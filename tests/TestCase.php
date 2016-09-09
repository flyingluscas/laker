<?php

namespace FlyingLuscas\Laker\Tests;

use FlyingLuscas\Laker\LakerServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class Testcase extends OrchestraTestCase
{
    /**
     * {@inheritdoc}
     */
    public function getPackageProviders($app)
    {
        return [LakerServiceProvider::class];
    }
}

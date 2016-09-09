<?php

namespace FlyingLuscas\Laker\Tests;

use Mockery;
use FlyingLuscas\Laker\LakerServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * {@inheritdoc}
     */
    public function getPackageProviders($app)
    {
        return [LakerServiceProvider::class];
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();
    }
}

<?php

namespace Myopentrip\LaravelPackage\Tests;

use Myopentrip\LaravelPackage\LaravelPackageServiceProvider;
use Orchestra\Testbench\TestCase as TestbenchTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCase extends TestbenchTestCase
{
    // use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [LaravelPackageServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
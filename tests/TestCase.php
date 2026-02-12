<?php

namespace Imv\Sso\Tests;

use Imv\Sso\SsoServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            SsoServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('sso.base_url', 'https://sso.example.com/');
        config()->set('sso.client_id', 'test-client');
        config()->set('sso.client_secret', 'test-secret');
    }
}

<?php

namespace Nicekiwi\AuthSignal\Tests;

use Illuminate\Foundation\Application;
use Nicekiwi\AuthSignal\Facade\Mfa;
use Nicekiwi\AuthSignal\ServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @param Application $app
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [ServiceProvider::class];
    }

    /**
     * @param Application $app
     * @return string[]
     */
    protected function getPackageAliases($app): array
    {
        return [
            'MFA' => Mfa::class,
            'Mfa' => Mfa::class,
        ];
    }
}

<?php

namespace Nicekiwi\AuthSignal;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/authsignal.php' => config_path('authsignal.php'),
        ]);
    }

    public function register(): void
    {
        $configPath = __DIR__ . '/../config/authsignal.php';
        $this->mergeConfigFrom($configPath, 'authsignal');

        $this->app->bind('authsignal.wrapper', function ($app) {
            return new MFA($app['authsignal'], $app['config']);
        });
    }

    public function provides(): array
    {
        return ['authsignal.wrapper'];
    }
}

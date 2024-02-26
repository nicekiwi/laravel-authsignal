<?php

namespace Nicekiwi\AuthSignal\Facade;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Facade as IlluminateFacade;

class Mfa extends IlluminateFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'authsignal.wrapper';
    }

    /**
     * Resolve a new instance
     * @param string $method
     * @param array<mixed> $args
     * @return mixed
     * @throws BindingResolutionException
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::$app->make(static::getFacadeAccessor());

        return $instance->$method(...$args);
    }
}

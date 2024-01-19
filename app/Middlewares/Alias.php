<?php

namespace App\Middlewares;

final class Alias
{
    /**
     * Middleware alias
     */
    public array $middlewares = [
        "throttle" => ThrottleRequest::class,
    ];

    public function __construct()
    {
        foreach ($this->middlewares as $contract => $middleware) {
            $this->bindMiddleware($contract, $middleware);
        }
    }

    /**
     * Binding middleware to service container
     * 
     * @param string $contract
     * @param string $middleware
     * @return void
     */
    public function bindMiddleware(string $contract, string $middleware): void
    {
        app()->container->bind("middleware_alias_" . $contract, function () use ($middleware) {
            return new $middleware();
        });
    }

    /**
     * Resolve middleware in service container
     * 
     * @param string $contract
     * @param string $middleware
     * @return mixed
     */
    public function resolveMiddleware(string $contract): mixed
    {
        return app()->container->resolve("middleware_alias_" . $contract);
    }
}

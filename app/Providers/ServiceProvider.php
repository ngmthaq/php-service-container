<?php

namespace App\Providers;

abstract class ServiceProvider implements ServiceProviderContract
{
    public function __construct()
    {
        $this->register();
        $this->boostrap();
    }

    abstract function register(): void;

    abstract function boostrap(): void;

    public function bindContainer(string $contract, callable $callback): void
    {
        app()->container->bind($contract, $callback);
    }

    public function resolveContainer(string $contract): mixed
    {
        return app()->container->resolve($contract);
    }
}

<?php

namespace App\Providers;

interface  ServiceProviderContract
{
    /**
     * Run when provider is bootstrapping
     * 
     * @return void
     */
    public function boostrap(): void;

    /**
     * Register provider containers
     */
    public function register(): void;

    /**
     * Bind container with contract and callback
     * 
     * @param string $contract
     * @param callable $callback
     * @return void
     */
    public function bindContainer(string $contract, callable $callback): void;

    /**
     * Resolve container with contract and callback
     * 
     * @param string $contract
     * @return mixed
     */
    public function resolveContainer(string $contract): mixed;
}

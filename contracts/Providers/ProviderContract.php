<?php

namespace Contracts\Providers;

interface ProviderContract
{
    /**
     * Register service provider items
     * 
     * @return void
     */
    public function register(string $name, callable $callback): void;

    /**
     * Resolve and get provider item
     * 
     * @param string $name
     * @return mixed
     */
    public function resolve(string $name): mixed;

    /**
     * Init provider item instance
     * 
     * @param string $name
     * @return mixed
     */
    public function initInstance(string $name): mixed;

    /**
     * Run when app bootstrapping
     * 
     * @return void
     */
    public function bootstrap(): void;
}

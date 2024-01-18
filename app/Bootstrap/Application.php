<?php

namespace App\Bootstrap;

final class Application
{
    /**
     * Service Container
     */
    public Container $container;

    public array $providers;

    public function __construct()
    {
        $this->container = new Container();
        $this->providers = array();
    }

    /**
     * Register new provider
     * 
     * @param string $provider
     * @return void
     */
    public function registerProvider(string $provider): void
    {
        $this->providers[] = $provider;
    }

    /**
     * Run the application
     * 
     * @return void
     */
    public function run(): void
    {
        foreach ($this->providers as $provider) {
            $provider_instance = new $provider();
        }
    }
}

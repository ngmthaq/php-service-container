<?php

namespace Src;

use Src\Providers\RouteProvider;

class Application
{
    private array $providers = [
        RouteProvider::class
    ];

    public function run(): void
    {
        foreach ($this->providers as $provider) {
            $provider_instance = new $provider();
            $provider_instance->bootstrap();
        }
    }
}

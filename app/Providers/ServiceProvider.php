<?php

namespace App\Providers;

abstract class ServiceProvider implements ServiceProviderContract
{
    public function __construct()
    {
        $this->boostrap();
    }

    abstract function boostrap(): void;
}

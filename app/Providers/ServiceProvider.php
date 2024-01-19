<?php

namespace App\Providers;

abstract class ServiceProvider
{
    public function __construct()
    {
        $this->boostrap();
    }

    /**
     * Run when provider is bootstrapping
     * 
     * @return void
     */
    abstract function boostrap(): void;
}

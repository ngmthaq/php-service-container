<?php

namespace App\Providers;

interface RouteServiceProviderContract extends ServiceProviderContract
{
    /**
     * Register routes of the application
     * 
     * @return void
     */
    public function routes(): void;
}

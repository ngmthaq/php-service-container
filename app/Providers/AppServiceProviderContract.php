<?php

namespace App\Providers;

interface AppServiceProviderContract extends ServiceProviderContract
{
    /**
     * Handle start session
     * 
     * @return void
     */
    public function startSession(): void;

    /**
     * Handle load .env
     * 
     * @return void
     */
    public function loadEnv(): void;
}

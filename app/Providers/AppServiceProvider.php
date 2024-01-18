<?php

namespace App\Providers;

use Dotenv\Dotenv;

class AppServiceProvider extends ServiceProvider implements AppServiceProviderContract
{
    public function startSession(): void
    {
        session_start();
    }

    public function loadEnv(): void
    {
        $dotenv = Dotenv::createImmutable(__ROOT__);
        $dotenv->safeLoad();
    }

    public function boostrap(): void
    {
        $this->startSession();
        $this->loadEnv();
    }

    public function register(): void
    {
        //
    }
}

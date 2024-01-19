<?php

namespace App\Providers;

use Dotenv\Dotenv;

class AppServiceProvider extends ServiceProvider
{
    public function boostrap(): void
    {
        $this->startSession();
        $this->loadEnv();
    }

    /**
     * Handle start session
     * 
     * @return void
     */
    public function startSession(): void
    {
        session_start();
    }

    /**
     * Handle load .env
     * 
     * @return void
     */
    public function loadEnv(): void
    {
        $dotenv = Dotenv::createImmutable(__ROOT__);
        $dotenv->safeLoad();
    }
}

<?php

namespace App\Providers;

use Dotenv\Dotenv;

class AppServiceProvider extends ServiceProvider implements AppServiceProviderContract
{
    public function boostrap(): void
    {
        session_start();
        Dotenv::createImmutable("../../");
    }

    public function register(): void
    {
        //
    }
}

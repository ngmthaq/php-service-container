<?php

namespace App\Providers;

use App\Controllers\HomeController;

class RouterServiceProvider extends RouteServiceProvider
{
    public function routes(): array
    {
        return [
            $this->get("/", HomeController::class, "index"),
        ];
    }
}

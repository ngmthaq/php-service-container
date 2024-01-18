<?php

namespace App\Providers;

use App\Controllers\HomeControllerContract;

class RouterServiceProvider extends RouteServiceProvider implements RouterServiceProviderContract
{
    public function routes(): array
    {
        return [
            $this->get("/", HomeControllerContract::class, "index"),
        ];
    }
}

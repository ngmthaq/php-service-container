<?php

namespace Src\Providers;

use Contracts\Providers\RouteProviderContract;

class RouteProvider extends Provider implements RouteProviderContract
{
    public function routes(): array
    {
        return [];
    }

    public function bootstrap(): void
    {
        echo "Run";
    }
}

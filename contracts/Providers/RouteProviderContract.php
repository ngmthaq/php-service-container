<?php

namespace Contracts\Providers;

interface RouteProviderContract extends ProviderContract
{
    public function routes(): array;
}

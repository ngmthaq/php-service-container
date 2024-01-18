<?php

namespace App\Providers;

use App\Exceptions\NotFoundException;

class RouteServiceProvider extends ServiceProvider implements RouteServiceProviderContract
{
    public function boostrap(): void
    {
        $routes = $this->routes();
        $method = $_SERVER["REQUEST_METHOD"];
        $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        $route = array_find(function ($r) use ($method, $path) {
            return $r["method"] === $method && $r["path"] === $path;
        }, $routes);

        if (!$route) throw new NotFoundException();

        $contract = $route["contract"];
        if (gettype($contract) === "object") {
            $contract();
        } else {
            $action = $route["action"];
            $controller = app()->container->resolve($contract);
            $controller->$action();
        }
    }

    public function get(string $path, callable | string $contract, string $action = ''): array
    {
        $method = "GET";
        return compact("method", "path", "contract", "action");
    }

    public function post(string $path, callable | string $contract, string $action = ''): array
    {
        $method = "POST";
        return compact("method", "path", "contract", "action");
    }

    public function routes(): array
    {
        return [];
    }
}

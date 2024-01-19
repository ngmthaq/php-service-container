<?php

namespace App\Providers;

use App\Exceptions\NotFoundException;
use App\Helpers\Request;
use App\Middlewares\Alias;

class RouteServiceProvider extends ServiceProvider
{
    public function boostrap(): void
    {
        // Initital request configs
        $routes = $this->routes();
        $method = $_SERVER["REQUEST_METHOD"];
        $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $request = new Request();
        $middleware_alias = new Alias();

        // Find route match with incoming request
        $route = array_find(function ($r) use ($method, $path) {
            return $r["method"] === $method && $r["path"] === $path;
        }, $routes);

        // Throw NotFoundException if cannot found route
        if (!$route) throw new NotFoundException();

        // Run middlewares
        $middlewares = $route["middlewares"];
        foreach ($middlewares as $middleware_contract) {
            $middleware = $middleware_alias->resolveMiddleware($middleware_contract);
            $middleware->handle($request);
        }

        // Run controller
        $contract = $route["contract"];
        if (gettype($contract) === "object") {
            $contract();
        } else {
            $action = $route["action"];
            $controller = app()->container->resolve($contract);
            $controller->$action($request);
        }
    }

    /**
     * Register get request
     * 
     * @param string $path
     * @param callable | string $controller
     * @param string $action
     * @param array $middlewares
     * @return array
     */
    public function get(string $path, callable | string $contract, string $action = '', array $middlewares = []): array
    {
        $method = "GET";
        return compact("method", "path", "contract", "action", "middlewares");
    }

    /**
     * Register post request
     * 
     * @param string $path
     * @param callable | string $controller
     * @param string $action
     * @param array $middlewares
     * @return array
     */
    public function post(string $path, callable | string $contract, string $action = '', array $middlewares = []): array
    {
        $method = "POST";
        return compact("method", "path", "contract", "action", "middlewares");
    }

    /**
     * Register routes of the application
     * 
     * @return array
     */
    public function routes(): array
    {
        return [];
    }
}

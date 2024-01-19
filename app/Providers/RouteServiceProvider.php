<?php

namespace App\Providers;

use App\Exceptions\NotFoundException;
use App\Helpers\Request;

class RouteServiceProvider extends ServiceProvider
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
            $request = new Request();
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
     * @return array
     */
    public function get(string $path, callable | string $contract, string $action = ''): array
    {
        $method = "GET";
        return compact("method", "path", "contract", "action");
    }

    /**
     * Register post request
     * 
     * @param string $path
     * @param callable | string $controller
     * @param string $action
     * @return array
     */
    public function post(string $path, callable | string $contract, string $action = ''): array
    {
        $method = "POST";
        return compact("method", "path", "contract", "action");
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

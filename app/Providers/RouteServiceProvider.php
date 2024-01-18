<?php

namespace App\Providers;

use App\Exceptions\InternalErrorException;
use App\Exceptions\NotFoundException;

class RouteServiceProvider extends ServiceProvider implements RouteServiceProviderContract
{
    public function routes(): array
    {
        return [
            $this->get("/", function () {
                echo "RUN";
            }),
        ];
    }

    public function boostrap(): void
    {
        try {
            $routes = $this->routes();
            $method = $_SERVER["REQUEST_METHOD"];
            $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

            $route = array_find(function ($r) use ($method, $path) {
                return $r["method"] === $method && $r["path"] === $path;
            }, $routes);

            if (!$route) throw new NotFoundException();

            $controller = $route["controller"];
            if (gettype($controller) === "object") {
                $controller();
            } else {
                $action = $route["action"];
                $controller_instance = new $controller();
                $controller_instance->$action();
            }
        } catch (\Throwable $th) {
            throw new InternalErrorException($th);
        }
    }

    public function register(): void
    {
        //
    }

    public function get(string $path, callable | string $controller, string $action = ''): array
    {
        $method = "GET";
        return compact("method", "path", "controller", "action");
    }

    public function post(string $path, callable | string $controller, string $action = ''): array
    {
        $method = "POST";
        return compact("method", "path", "controller", "action");
    }
}

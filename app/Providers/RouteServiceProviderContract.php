<?php

namespace App\Providers;

interface RouteServiceProviderContract extends ServiceProviderContract
{
    /**
     * Register routes of the application
     * 
     * @return array
     */
    public function routes(): array;

    /**
     * Register get request
     * 
     * @param string $path
     * @param callable | string $controller
     * @param string $action
     * @return array
     */
    public function get(string $path, callable | string $controller, string $action = ""): array;

    /**
     * Register post request
     * 
     * @param string $path
     * @param callable | string $controller
     * @param string $action
     * @return array
     */
    public function post(string $path, callable | string $controller, string $action = ""): array;
}

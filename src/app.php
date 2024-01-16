<?php

namespace Src;

use Exception;

class Application
{
    private array $providers = [];

    public function run(): void
    {
    }

    public function resolve(string $name): mixed
    {
        if (empty($providers[$name])) throw new Exception("Cannot resolve '$name' in provider");
        $item = $this->providers[$name];
        $instance = isset($item["instance"]) ? $item["instance"] : $this->initInstance($name);

        return $instance;
    }

    public function initInstance(string $name): mixed
    {
        $item = $this->providers[$name];
        $callback = $item["callback"];
        $instance = $callback();
        $this->providers[$name]["instance"] = $instance;

        return $instance;
    }

    public function register(string $name, callable $callback): void
    {
        $instance = null;
        $this->providers[$name] = compact("callback", "instance");
    }
}

<?php

namespace Src\Providers;

use Constracts\Providers\ProviderContract;
use Exception;

abstract class Provider implements ProviderContract
{
    protected array $items = [];

    public function resolve(string $name): mixed
    {
        if (empty($items[$name])) throw new Exception("Cannot resolve '$name' in provider");
        $item = $this->items[$name];
        $instance = isset($item["instance"]) ? $item["instance"] : $this->initInstance($name);

        return $instance;
    }

    public function initInstance(string $name): mixed
    {
        $item = $this->items[$name];
        $callback = $item["callback"];
        $instance = $callback();
        $this->items[$name]["instance"] = $instance;

        return $instance;
    }

    public function register(string $name, callable $callback): void
    {
        $instance = null;
        $this->items[$name] = compact("callback", "instance");
    }
}

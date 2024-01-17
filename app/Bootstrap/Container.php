<?php

namespace App\Bootstrap;

final class Container
{
    protected array $items;

    public function __construct()
    {
        $this->items = [];
    }

    /**
     * Binding contract with a module callback
     * 
     * @param string $contract
     * @param callable $callback
     * @return void
     */
    public function bind(string $contract, callable $callback): void
    {
        $instance = null;
        $this->items[$contract] = compact("callback", "instance");
    }

    /**
     * Resolve contract and get instance
     * 
     * @param string $contract
     * @return mixed
     */
    public function resolve(string $contract): mixed
    {
        if (empty($this->items[$contract])) throw new \Exception("Cannot found '$contract' in Service Container");
        $item = $this->items[$contract];
        $instance = isset($item["instance"]) ? $item["instance"] : $this->make($contract);

        return $instance;
    }

    /**
     * Get contract and make an instance
     * 
     * @param string $contract
     * @return mixed
     */
    private function make(string $contract): void
    {
        $item = $this->items[$contract];
        $callback = $item["callback"];
        $instance = $callback();
        $this->items[$contract]["instance"] = $instance;

        return $instance;
    }
}

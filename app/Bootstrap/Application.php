<?php

namespace App\Bootstrap;

final class Application
{
    /**
     * Service Container
     */
    public Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    /**
     * Run the application
     * 
     * @return void
     */
    public function run(): void
    {
        //
    }
}

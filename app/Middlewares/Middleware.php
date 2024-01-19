<?php

namespace App\Middlewares;

use App\Helpers\Request;

abstract class Middleware
{
    /**
     * Handling middleware
     * 
     * @param Request $request
     * @return void
     */
    abstract public function handle(Request $request): void;
}

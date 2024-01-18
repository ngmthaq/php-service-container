<?php

use App\Providers\AppServiceProvider;
use App\Providers\RouterServiceProvider;

require_once "../vendor/autoload.php";

try {
    ob_start();

    define("__ROOT__", realpath("../"));

    app()->registerProvider(AppServiceProvider::class);

    app()->registerProvider(RouterServiceProvider::class);

    app()->run();
} catch (\Throwable $th) {
    return json(["message" => $th->getMessage()], $th->getCode());
}

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
    $message = ["message" => $th->getMessage(), "trace" => $th->getTrace()];
    if ($_ENV["APP_ENVIRONMENT"] === "production") unset($message["trace"]);
    send_json($message, $th->getCode());
}

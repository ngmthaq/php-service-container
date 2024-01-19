<?php

namespace App\Middlewares;

use App\Exceptions\ForbiddenException;

class ThrottleRequest extends Middleware
{
    public const LIMIT_RATE = 30;
    public const THROTTLE_REQUEST_KEY = "THROTTLE_REQUEST_KEY";

    public function handle(\App\Helpers\Request $request): void
    {
        if ($_ENV["APP_ENVIRONMENT"]) {
            if (empty($_SESSION[self::THROTTLE_REQUEST_KEY])) {
                $_SESSION[self::THROTTLE_REQUEST_KEY] = [
                    "timestamp" => time(),
                    "number" => 1,
                ];
            } else {
                $current_time = time();
                $throttle_start_time = $_SESSION[self::THROTTLE_REQUEST_KEY]["timestamp"];
                if ($current_time - $throttle_start_time > 60) {
                    $_SESSION[self::THROTTLE_REQUEST_KEY] = [
                        "timestamp" => $current_time,
                        "number" => 1,
                    ];
                } else {
                    $_SESSION[self::THROTTLE_REQUEST_KEY]["number"] += 1;
                }
                if ($_SESSION[self::THROTTLE_REQUEST_KEY]["number"] > self::LIMIT_RATE) {
                    throw new ForbiddenException("You are sending too many requests to our server at once");
                }
            }
        }
    }
}

<?php

use App\Controllers\HomeController;

app()->container->bind(HomeController::class, function () {
    return new HomeController();
});

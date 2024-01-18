<?php

use App\Controllers\HomeController;
use App\Controllers\HomeControllerContract;

app()->container->bind(HomeControllerContract::class, function () {
    return new HomeController();
});

<?php

use App\Providers\AppServiceProvider;
use App\Providers\RouteServiceProvider;

/*
|--------------------------------------------------------------------------
| Register constants
|--------------------------------------------------------------------------
*/

define("__ROOT__", realpath("../"));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require_once "../vendor/autoload.php";

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request. 
| Then, we will send the response back to this client's browser, 
| allowing them to enjoy our application.
|
*/

require_once "./helpers.php";

app()->registerProvider(AppServiceProvider::class);

app()->registerProvider(RouteServiceProvider::class);

app()->run();

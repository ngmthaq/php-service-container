<?php

use Src\Application;

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

require_once(__DIR__ . "../vendor/autoload.php");

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

$app = new Application();
$app->run();

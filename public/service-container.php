<?php

use App\Bootstrap\Application;

$GLOBALS['app'] = new Application();

function app(): Application
{
    return $GLOBALS['app'];
}

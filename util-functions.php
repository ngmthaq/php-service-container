<?php

use App\Bootstrap\Application;

$GLOBALS['app'] = new Application();

function app(): Application
{
    return $GLOBALS['app'];
}

function dd(): void
{
    $args = func_get_args();
    echo "<pre>";
    foreach ($args as $arg) {
        print_r($arg);
        echo (PHP_EOL . "======" . PHP_EOL . PHP_EOL);
    }
    echo "</pre>";
    die();
}

function uuidv4()
{
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
}

function array_find(callable $callback, array $array)
{
    $array_filter = array_filter($array, $callback);
    if (count($array_filter) > 0) return $array_filter[0];

    return null;
}

function json(array $data, int $status = 200)
{
    ob_clean();
    header('Content-Type: application/json; charset=utf-8');
    http_response_code($status);
    echo json_encode($data);
}

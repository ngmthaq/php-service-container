<?php

use App\Bootstrap\Application;
use App\Exceptions\NotFoundException;

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

function send_json(array $data, int $status = 200)
{
    ob_clean();
    header('Content-Type: application/json; charset=utf-8');
    http_response_code($status);
    echo json_encode($data);
    exit();
}

function send_plain_text(string $data, int $status = 200)
{
    ob_clean();
    header('Content-Type: text/plain; charset=utf-8');
    http_response_code($status);
    echo $data;
    exit();
}

function send_file(string $file_path)
{
    ob_clean();
    if (!file_exists($file_path)) throw new NotFoundException();
    http_response_code(200);
    header('Content-Description: File Transfer');
    header('Content-Type: ' . mime_content_type($file_path));
    header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_path));
    readfile($file_path);
    exit();
}

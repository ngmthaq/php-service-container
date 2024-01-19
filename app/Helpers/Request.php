<?php

namespace App\Helpers;

class Request
{
    public array $queries;
    public array $params;
    public array $files;
    public array $cookies;
    public array $sessions;

    public function __construct()
    {
        $this->queries = $this->prepare($_GET);
        $this->params = $this->prepare($_POST);
        $this->files = $_FILES;
        $this->cookies = $_COOKIE;
        $this->sessions = $_SESSION;
    }

    /**
     * Prepare user array input
     * 
     * @param array $input
     * @return array
     */
    protected function prepare(array $input): array
    {
        $output = [];

        foreach ($input as $key => $value) {
            if (gettype($value) === "array") {
                $output[$key] = $this->prepare($value);
            } elseif (gettype($value) === "string") {
                $output[$key] = htmlentities(trim($value));
            } else {
                $output[$key] = $value;
            }
        }

        return $output;
    }
}

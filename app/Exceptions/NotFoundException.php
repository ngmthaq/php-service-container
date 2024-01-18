<?php

namespace App\Exceptions;

final class NotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Not Found Exception", 404);
    }
}

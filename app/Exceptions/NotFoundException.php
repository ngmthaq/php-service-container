<?php

namespace App\Exceptions;

use Exception;

final class NotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct("Not Found", 404);
    }
}

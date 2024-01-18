<?php

namespace App\Exceptions;

use Exception;
use Throwable;

final class InternalServerErrorException extends Exception
{
    public function __construct(string $message = "Internal Server Error", Throwable $previous)
    {
        parent::__construct($message, 500, $previous);
    }
}

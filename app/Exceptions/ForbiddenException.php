<?php

namespace App\Exceptions;

use Exception;

final class ForbiddenException extends Exception
{
    public string $reason;

    public function __construct(string $reason)
    {
        parent::__construct("Forbidden Exception", 403);
        $this->reason = $reason;
    }
}

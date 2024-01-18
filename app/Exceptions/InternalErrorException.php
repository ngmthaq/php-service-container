<?php

namespace App\Exceptions;

use Throwable;

final class InternalErrorException extends \Exception
{
    protected Throwable $th;

    public function __construct(Throwable $throwable)
    {
        parent::__construct("Internal Error Exception", 500);
        $this->th = $throwable;
    }

    public function getThrowable(): Throwable
    {
        return $this->th;
    }
}

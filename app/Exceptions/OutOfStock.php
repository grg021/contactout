<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class OutOfStock extends Exception
{
    public function __construct($message = "Out of stock!", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

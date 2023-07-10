<?php

namespace App\Services\Reader\Exceptions;

use Exception;

class BadDataFoundException extends Exception
{
    public function __construct(string $filename, string $message = 'Bad data found')
    {
        parent::__construct($filename . ": " . $message);
    }
}

<?php

namespace App\Services\Reader\Exceptions;

use Exception;

class FileNotFoundException extends Exception
{
    public function __construct(string $filename, string $message = 'File not found')
    {
        parent::__construct($filename . ": " . $message);
    }
}

<?php

namespace App\Services\Reader\Factory;

use App\Services\Reader\Contracts\ReaderContract;
use App\Services\Reader\Implementations\JsonReader;
use App\Services\Reader\ReaderService;

class ReaderFactory
{
    public static function json(): ReaderContract
    {
        return new ReaderService(new JsonReader());
    }
}

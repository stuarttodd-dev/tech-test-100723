<?php

namespace App\Services\Reader\Contracts;

use Illuminate\Support\Collection;

interface ReaderContract
{
    public function read(string $file): Collection;
}

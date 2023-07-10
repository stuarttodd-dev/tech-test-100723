<?php

namespace App\Services\Reader;

use App\Services\Reader\Contracts\ReaderContract;
use Illuminate\Support\Collection;

class ReaderService implements ReaderContract
{
    private ReaderContract $reader;

    public function __construct(ReaderContract $reader)
    {
        $this->reader = $reader;
    }

    public function read(string $file): Collection
    {
        return $this->reader->read($file);
    }

}

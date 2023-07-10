<?php

namespace App\Services\Reader\Implementations;

use App\Services\Reader\Contracts\ReaderContract;
use App\Services\Reader\Exceptions\BadDataFoundException;
use App\Services\Reader\Exceptions\FileNotFoundException;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Storage;

class JsonReader implements ReaderContract
{
    private $disc = 'local'; // Maybe use setters here

    /**
     * @param string $file
     * @return Collection
     *
     * @throws FileNotFoundException
     * @throws BadDataFoundException
     */
    public function read(string $file): Collection
    {
        if (!Storage::disk($this->disc)->exists($file)) {
            throw new FileNotFoundException($file);
        }

        $json = Storage::disk($this->disc)->get($file);
        $rows = array_filter(explode("\n", $json));

        $result = [];

        foreach ($rows as $row) {
            $decodedRow = json_decode($row);
            if ($decodedRow === null) {
                continue;
            }

            $result[] = json_decode($row);
        }

        if (empty($result)) {
            throw new BadDataFoundException($file);
        }

        return collect($result);
    }

}

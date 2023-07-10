<?php

namespace App\Actions;

use App\Helpers\Math;
use App\Services\Reader\Factory\ReaderFactory;
use Illuminate\Support\Collection;

class GetAffiliatesAction
{
    const FILENAME = 'public/affiliates.txt';

    public function __invoke(): Collection
    {
        $data = ReaderFactory::json()->read(self::FILENAME);

        return $data->map(function($item) {
            $item->distance = Math::distance(
                env('OFFICE_LATITUDE'),
                env('OFFICE_LONGITUDE'),
                $item->latitude,
                $item->longitude
            );
            return $item;
        })->filter(function($item) {
            return $item->distance <= 100;
        })->sortBy('affiliate_id');
    }
}

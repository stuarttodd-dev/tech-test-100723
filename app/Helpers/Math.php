<?php

namespace App\Helpers;

class Math
{
    /**
     * @param float $lat1
     * @param float $lon1
     * @param float $lat2
     * @param float $lon2
     * @param float $earthRadius
     *
     * @return float
     */
    public static function distance(float $lat1, float $lon1, float $lat2, float $lon2, $earthRadius = 6371): float
    {
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * asin(sqrt($a));

        return $earthRadius * $c;
    }
}

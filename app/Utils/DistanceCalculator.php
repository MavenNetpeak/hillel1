<?php

namespace App\Utils;

class DistanceCalculator
{
    public static function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        // Реализация расчета расстояния
        return 2 * asin(sqrt(pow(sin(($lat1 - $lat2) / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(($lon1 - $lon2) / 2), 2)));
    }
}


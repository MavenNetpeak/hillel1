<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeocoderService;
use App\Utils\DistanceCalculator;

class HomeWorkSolidController extends Controller
{
    protected $geocoderService;

    public function __construct(GeocoderService $geocoderService)
    {
        $this->geocoderService = $geocoderService;
    }

    public function index(Request $request)
    {
        $search = 'Продукти Одеса';
        $excludePlaceIds = '';

        // Начальные координаты
        $lat = 46.4774700;
        $lon = 30.7326200;

        do {
            $places = $this->geocoderService->getPlaces($search, $excludePlaceIds);

            // Расчет расстояния и сортировка
            foreach ($places as $place) {
                $place->distance = DistanceCalculator::calculateDistance($lat, $lon, $place->lat, $place->lon);
            }
            usort($places, function($a, $b) {
                return ($a->distance < $b->distance) ? -1 : 1;
            });

            // Фильтрация и форматирование результатов
            $formattedPlaces = [];
            foreach ($places as $place) {
                $formattedPlaces[$place->place_id] = [
                    'place_id' => $place->place_id,
                    'name' => $place->name ?? null,
                    'display_name' => $place->display_name,
                    'distance' => $place->distance
                ];
            }

            // Вывод данных и обновление исключенных мест
            dump($formattedPlaces);
            $excludePlaceIds = '&exclude_place_ids=' . urlencode(implode(',', array_keys($formattedPlaces)));

        } while (!empty($places));

        return response()->json($formattedPlaces);
    }
}

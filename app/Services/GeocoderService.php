<?php

namespace App\Services;

use GuzzleHttp\Client as GuzzleClient;

class GeocoderService
{
    protected $guzzleClient;
    protected $baseUrl;

    public function __construct(GuzzleClient $guzzleClient, $baseUrl = 'https://nominatim.openstreetmap.org/search.php?format=jsonv2&q=')
    {
        $this->guzzleClient = $guzzleClient;
        $this->baseUrl = $baseUrl;
    }

    public function getPlaces(string $search, string $excludePlaceIds = '')
    {
        $response = $this->guzzleClient->request('GET', $this->baseUrl . urlencode($search) . $excludePlaceIds);
        return json_decode($response->getBody()->getContents());
    }
}

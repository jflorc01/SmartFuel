<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class RouteOptimizationService
{
    protected Client $http;
    protected string $apiKey;

    public function __construct()
    {
        $this->http = new Client();
        $this->apiKey = env('GOOGLE_MAPS_KEY');         
        if (!$this->apiKey) {
            throw new \Exception("Define GOOGLE_MAPS_KEY en .env con tu API key de Google Maps");
        }
    }

    /**
     * @param array $base [lat, lng]
     * @param array $waypoints  array de [lat, lng]
     * @return array [
     *   'order' => [0,2,1,...],      // índices optimizados
     *   'polyline' => 'abcdEfg...'      // overview_polyline
     * ]
     * @throws \Exception
     */
    public function optimize(array $base, array $waypoints): array
    {
        if (empty($waypoints)) {
            return ['order'=>[], 'polyline'=>''];
        }

        // Formatea origen/destino
        $coord = "{$base[0]},{$base[1]}";
        // Formatea waypoints con optimize:true
        $wpList = array_map(fn($c) => "{$c[0]},{$c[1]}", $waypoints);
        $waypointsParam = 'optimize:true|' . implode('|', $wpList);

        // Llamada a Directions API
        $url = 'https://maps.googleapis.com/maps/api/directions/json';
        try {
            $res = $this->http->get($url, [
                'query' => [
                    'origin' => $coord,
                    'destination' => $coord,
                    'waypoints' => $waypointsParam,
                    'key' => $this->apiKey,
                    'mode' => 'driving',
                    'departure_time' => 'now',
                ],
            ]);
        } catch (GuzzleException $e) {
            throw new \Exception("Error al llamar a Google Directions: {$e->getMessage()}");
        }

        $data = json_decode($res->getBody()->getContents(), true);
        if (empty($data['routes'][0])) {
            throw new \Exception("Google Directions no devolvió rutas: " . ($data['status'] ?? ''));
        }

        $route = $data['routes'][0];

        // Extraer orden y polyline
        $order = $route['waypoint_order'] ?? [];
        $polyline = $route['overview_polyline']['points'] ?? '';

        return ['order'=>$order, 'polyline'=>$polyline];
    }
}
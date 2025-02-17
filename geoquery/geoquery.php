<?php
class Point {
    public float $latitude;
    public float $longitude;

    function __construct($lat, $lng) {
        $this->latitude = $lat;
        $this->latitude = $lng;
    }
}
class GeoQuery {
    public static function calculateBoundingBox($latitude, $longitude, $distance) {
        $earthRadius = 6371000;
    
        $lat = deg2rad($latitude);
        $lon = deg2rad($longitude);
    
        $radDistance = $distance / $earthRadius;
    
        // Calculate min and max latitude
        $minLat = $lat - $radDistance;
        $maxLat = $lat + $radDistance;
    
        // Calculate min and max longitude
        $minLon = $lon - asin(sin($radDistance) / cos($lat));
        $maxLon = $lon + asin(sin($radDistance) / cos($lat));
    
        return [
            'minLat' => rad2deg($minLat),
            'maxLat' => rad2deg($maxLat),
            'minLon' => rad2deg($minLon),
            'maxLon' => rad2deg($maxLon),
        ];
    }
}

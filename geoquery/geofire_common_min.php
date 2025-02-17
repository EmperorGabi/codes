<?php

class GeoFireCommon {
    const BASE32 = "0123456789bcdefghjkmnpqrstuvwxyz";
    const EARTH_EQ_RADIUS = 6378137; // Earth's radius in meters
    const METERS_PER_DEGREE_LATITUDE = 110574;
    const E2 = 0.00669447819799; // Eccentricity squared
    const GEOHASH_PRECISION = 10;
    const EARTH_RADIUS_KM = 6371;

    public static function degreesToRadians($degrees) {
        if (!is_numeric($degrees)) {
            throw new InvalidArgumentException("Degrees must be a number");
        }
        return $degrees * M_PI / 180;
    }

    public static function metersToLongitudeDegrees($meters, $latitude) {
        $latitudeRadians = self::degreesToRadians($latitude);
        $earthRadiusAtLatitude = (cos($latitudeRadians) * self::EARTH_EQ_RADIUS * M_PI / 180) /
                                 sqrt(1 - self::E2 * pow(sin($latitudeRadians), 2));
        if ($earthRadiusAtLatitude < 1e-12) {
            return $meters > 0 ? 360 : 0;
        }
        return min(360, $meters / $earthRadiusAtLatitude);
    }

    public static function latitudeBitsForResolution($resolution) {
        return min(floor(log(20003930 / $resolution) / log(2)), 110);
    }

    public static function longitudeBitsForResolution($resolution, $latitude) {
        $longDegrees = self::metersToLongitudeDegrees($resolution, $latitude);
        return abs($longDegrees) > 1e-6 ? max(1, floor(log(360 / $longDegrees) / log(2))) : 1;
    }

    public static function boundingBoxBits($location, $resolution) {
        $latitudeDegrees = $resolution / self::METERS_PER_DEGREE_LATITUDE;
        $northLatitude = min(90, $location[0] + $latitudeDegrees);
        $southLatitude = max(-90, $location[0] - $latitudeDegrees);

        $bitsLatitude = 2 * floor(self::latitudeBitsForResolution($resolution));
        $bitsNorthLongitude = 2 * floor(self::longitudeBitsForResolution($resolution, $northLatitude)) - 1;
        $bitsSouthLongitude = 2 * floor(self::longitudeBitsForResolution($resolution, $southLatitude)) - 1;

        return min($bitsLatitude, $bitsNorthLongitude, $bitsSouthLongitude, 110);
    }

    public static function wrapLongitude($longitude) {
        if ($longitude >= -180 && $longitude <= 180) {
            return $longitude;
        }
        $longitude = $longitude + 180;
        return $longitude > 0 ? ($longitude % 360) - 180 : 180 - (-$longitude % 360);
    }

    public static function boundingBoxCoordinates($location, $resolution) {
        $latitudeDelta = $resolution / self::METERS_PER_DEGREE_LATITUDE;
        $northLatitude = min(90, $location[0] + $latitudeDelta);
        $southLatitude = max(-90, $location[0] - $latitudeDelta);
        $longitudeDelta = self::metersToLongitudeDegrees($resolution, $northLatitude);
        $maxLongitudeDelta = max($longitudeDelta, self::metersToLongitudeDegrees($resolution, $southLatitude));

        return [
            [$location[0], $location[1]],
            [$location[0], self::wrapLongitude($location[1] - $maxLongitudeDelta)],
            [$location[0], self::wrapLongitude($location[1] + $maxLongitudeDelta)],
            [$northLatitude, $location[1]],
            [$northLatitude, self::wrapLongitude($location[1] - $maxLongitudeDelta)],
            [$northLatitude, self::wrapLongitude($location[1] + $maxLongitudeDelta)],
            [$southLatitude, $location[1]],
            [$southLatitude, self::wrapLongitude($location[1] - $maxLongitudeDelta)],
            [$southLatitude, self::wrapLongitude($location[1] + $maxLongitudeDelta)],
        ];
    }

    private static function validateLocation($location) {
        if (!is_array($location) || count($location) !== 2) {
            throw new InvalidArgumentException("Location must be an array of [latitude, longitude].");
        }
        [$lat, $lng] = $location;
        if (!is_numeric($lat) || $lat < -90 || $lat > 90) {
            throw new InvalidArgumentException("Latitude must be a number within the range [-90, 90].");
        }
        if (!is_numeric($lng) || $lng < -180 || $lng > 180) {
            throw new InvalidArgumentException("Longitude must be a number within the range [-180, 180].");
        }
    }

    public static function geohashForLocation($location, $precision = self::GEOHASH_PRECISION) {
        $latRange = [-90, 90];
        $lngRange = [-180, 180];
        $geohash = '';
        $bits = 0;
        $bitsTotal = 0;
        $even = true;

        while (strlen($geohash) < $precision) {
            if ($even) {
                $mid = ($lngRange[0] + $lngRange[1]) / 2;
                if ($location[1] > $mid) {
                    $bits = ($bits << 1) + 1;
                    $lngRange[0] = $mid;
                } else {
                    $bits = ($bits << 1) + 0;
                    $lngRange[1] = $mid;
                }
            } else {
                $mid = ($latRange[0] + $latRange[1]) / 2;
                if ($location[0] > $mid) {
                    $bits = ($bits << 1) + 1;
                    $latRange[0] = $mid;
                } else {
                    $bits = ($bits << 1) + 0;
                    $latRange[1] = $mid;
                }
            }
            $even = !$even;

            if (++$bitsTotal == 5) {
                $geohash .= self::BASE32[$bits];
                $bitsTotal = 0;
                $bits = 0;
            }
        }

        return $geohash;
    }

    public static function geohashQuery($geohash, $bits) {
        $precision = ceil($bits / 5);
        if (strlen($geohash) < $precision) {
            return [$geohash, $geohash . "~"];
        }
        $base = substr($geohash, 0, $precision - 1);
        $lastChar = substr($geohash, $precision - 1, 1);
        $lastCharBits = 5 - ($bits - (5 * strlen($base)));
        $base32Index = strpos(self::BASE32, $lastChar);
        $startChar = self::BASE32[$base32Index >> $lastCharBits << $lastCharBits];
        
        $index = ($base32Index >> $lastCharBits << $lastCharBits) + (1 << $lastCharBits);
        $endChar = ($index >= strlen(self::BASE32)) ? "~" : self::BASE32[$index];
    
        return [$base . $startChar, $base . $endChar];
    }
    

    public static function geohashQueryBounds($location, $radius) {
        $bits = max(1, self::boundingBoxBits($location, $radius));
        $precision = ceil($bits / 5);
        $coordinates = self::boundingBoxCoordinates($location, $radius);
        $queries = [];

        foreach ($coordinates as $coordinate) {
            $geohash = self::geohashForLocation($coordinate, $precision);
            $query = self::geohashQuery($geohash, $bits);
            $queries[] = $query;
        }

        // Filter duplicates
        $uniqueQueries = [];
        foreach ($queries as $query) {
            if (!in_array($query, $uniqueQueries, true)) {
                $uniqueQueries[] = $query;
            }
        }

        return $uniqueQueries;
    }

    public static function distanceBetween($point1, $point2) {
        self::validateLocation($point1);
        self::validateLocation($point2);

        $lat1 = $point1[0];
        $lng1 = $point1[1];
        $lat2 = $point2[0];
        $lng2 = $point2[1];

        $deltaLat = self::degreesToRadians($lat2 - $lat1);
        $deltaLng = self::degreesToRadians($lng2 - $lng1);

        $a = sin($deltaLat / 2) * sin($deltaLat / 2) +
            cos(self::degreesToRadians($lat1)) *
            cos(self::degreesToRadians($lat2)) *
            sin($deltaLng / 2) * sin($deltaLng / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return self::EARTH_RADIUS_KM * $c;
    }
}
?>

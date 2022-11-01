<?php

namespace App\Helpers;

class WeatherTranslater{

    public static function traslateWeather(string $key)
    {
        $weathers = [
            "Clouds" => "Nuageux",
            "Rain" => "Pluie"
        ];

        return $weathers[$key];
    }
}

<?php

namespace App\Helpers;

class WeatherTranslater{

    public static function translateWeather(string $key)
    {
        $weathers = [
            "Clouds" => "Nuageux",
            "Rain" => "Pluie"
        ];

        return $weathers[$key];
    }
}

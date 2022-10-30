<?php

// require_once "../private/index.php";

namespace App\Model;

class Forecast{

    public function getForecast(string $day)
    {
        $city = "Bujumbura";
        $lang = "fr";
        $url = "http://api.openweathermap.org/data/2.5/forecast?q={$city}&unit=metrics&lang={$lang}&appid=". API_KEY;

        return "Forecast";
    }
}

?>
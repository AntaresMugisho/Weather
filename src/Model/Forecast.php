<?php

namespace App\Model;

use DateTime;

require_once "../private/index.php";

class Forecast{

    private $data;

    public function __construct(string $city="Bujumbura", string $lang = "fr")
    {
        $city = $city;
        $lang = $lang;
        $api_call = "http://api.openweathermap.org/data/2.5/forecast?q={$city}&units=metric&lang={$lang}&appid=". API_KEY;

        $json = file_get_contents(dirname(__DIR__, 2) . "/private/data.json");
        
        $this->data = json_decode($json, true);
    }


    public function getForecast(): array
    {   
        foreach($this->data["list"] as $date){
            $forecast[] = [ 
                "date"          => new DateTime("@" . $date["dt"]),
                "temp"          => round($date["main"]["temp"], 1),
                "temp_min"      => round($date["main"]["temp_min"]),
                "temp_max"      => round($date["main"]["temp_max"]),
                "humidity"      => $date["main"]["humidity"],
                "feels_like"    => round($date["main"]["feels_like"]),
                "wind_speed"    => round($date["wind"]["speed"], 1),
                "wind_dir"      => $date["wind"]["deg"],
                "icon"          => $date["weather"][0]["icon"],
                "weather"       => $date["weather"][0]["main"],
                "pop"           => $date["pop"] * 100,
                "description"   => ucfirst($date["weather"][0]["description"])
            ];
        }

        return $forecast;
    }

    public function getDays(): array
    {   
        $forecasts = $this->getForecast();
        
        $days = [$forecasts[0]];

        foreach($forecasts as $forecast){
            if ($forecast["date"]->format("d") !== end($days)["date"]->format("d")){
                $days[] = $forecast;
            }
        }
        // Removing the actual day
        unset($days[0]);

        return $days;
    }

    public function getTemp(DateTime $day): int
    {   
        $forecasts = $this->getForecast();

        foreach($forecasts as $forecast){
            if ($forecast["date"]->format("d") === $day->format("d")){
                $temps[] = $forecast["temp"];
            }
        }
        
        return (int)(round(array_sum($temps) / count($temps))) ;
    }

    public function getMinTemp(DateTime $day): int
    {   
        $forecasts = $this->getForecast();

        foreach($forecasts as $forecast){
            if ($forecast["date"]->format("d") === $day->format("d")){
                $min_temps[] = $forecast["temp_min"];
            }
        }
        
        return (int)(min($min_temps));
    }

    public function getMaxTemp(DateTime $day): int
    {   
        $forecasts = $this->getForecast();

        foreach($forecasts as $forecast){
            if ($forecast["date"]->format("d") === $day->format("d")){
                $max_temps[] = $forecast["temp_max"];
            }
        }
        return (int)(max($max_temps));
    }

    public function getIcon(DateTime $day): string
    {   
        $forecasts = $this->getForecast();

        foreach($forecasts as $forecast){
            if ($forecast["date"]->format("d") === $day->format("d")){
                $icons[] = $forecast["icon"];
            }
        }
        // This icon is provided arbitrary. This must be automatic
        return $icons[2];
    }

    public function getDescription(DateTime $day): string
    {   
        $forecasts = $this->getForecast();

        foreach($forecasts as $forecast){
            if ($forecast["date"]->format("d") === $day->format("d")){
                $descriptions[] = $forecast["description"];
            }
        }

        // This description is provided arbitrary. This must be automatic
        return $descriptions[2] ;
    }

    public function getPop(DateTime $day): int
    {   
        $forecasts = $this->getForecast();

        foreach($forecasts as $forecast){
            if ($forecast["date"]->format("d") === $day->format("d")){
                $pops[] = $forecast["pop"];
            }
        }

        return (round(array_sum($pops) / count($pops)));
    }

    public function getWindSpeed(DateTime $day): int
    {   
        $forecasts = $this->getForecast();

        foreach($forecasts as $forecast){
            if ($forecast["date"]->format("d") === $day->format("d")){
                $wind_speeds[] = $forecast["wind_speed"];
            }
        }

        return (int)((array_sum($wind_speeds) / count($wind_speeds)));
    }


    public function getCity(): string
    {   
        return $this->data["city"]["name"] . ", " . $this->data["city"]["country"];
    }


}
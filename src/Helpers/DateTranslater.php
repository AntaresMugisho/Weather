<?php

namespace App\Helpers;

use DateTime;

class DateTranslater{

    public static function translateDay(DateTime $date, bool $longform = false)        
    {
        $days = [
            "Mon" => "Lun",
            "Tue" => "Mar",
            "Wed" => "Mer",
            "Thu" => "Jeu",
            "Fri" => "Ven",
            "Sat" => "Sam",
            "Sun" => "Dim",

            "Monday"    => "Lundi",
            "Tuesday"   => "Mardi",
            "Wednesday" => "Mercredi",
            "Thursday"  => "Jeudi",
            "Friday"    => "Vendredi",
            "Saturday"  => "Samedi",
            "Sunday"    => "Dimanche",
        ];
        
        if ($longform){
            return $days[$date->format("l")];
        }
        return $days[$date->format("D")];
    }
}
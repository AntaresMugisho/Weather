<?php

namespace App\Helpers;

use DateTime;

class DateTranslater{

    public static function shortFormat(DateTime $date)        
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

        return $days[$date->format("l") ?? $date->format("D")];
    }
}
<?php

namespace App\Helpers;

use DateTime;

class DateTranslater{

    public static function translateDate(DateTime $date, string $format): string
    {
        $dict = [
            // Days 

            "Monday"    => "Lundi",
            "Tuesday"   => "Mardi",
            "Wednesday" => "Mercredi",
            "Thursday"  => "Jeudi",
            "Friday"    => "Vendredi",
            "Saturday"  => "Samedi",
            "Sunday"    => "Dimanche",

            "Mon" => "Lun",
            "Tue" => "Mar",
            "Wed" => "Mer",
            "Thu" => "Jeu",
            "Fri" => "Ven",
            "Sat" => "Sam",
            "Sun" => "Dim",


            // Months 

            "January" => "Janvier",
            "February" => "Février",
            "March" => "Mars",
            "April" => "Avril",
            "May" => "Mai",
            "Jun" => "Juin",
            "July" => "Juillet",
            "August" => "Août",
            "September" => "Septembre",
            "October" => "Octobre",
            "November" => "Novembre",
            "December" => "Décembre",

            "Feb" => "Fév",
            "Apr" => "Avr",
            "May" => "Mai",
            "Jun" => "Juin",
            "Jul" => "Juil",
            "Aug" => "Août",
        ];

        $to_translate = $date->format($format);

        return str_replace(array_keys($dict), array_values($dict), $to_translate);
    }
}
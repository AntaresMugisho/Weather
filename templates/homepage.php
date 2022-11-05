<?php

use App\Helpers\DateTranslater;
use App\Helpers\WeatherTranslater;
use App\Model\Forecast;


$city = (isset($_GET["q"]) && !empty($_GET["q"])) ? ($_GET["q"]) : "Bujumbura";

$forecast = new Forecast($city);

$forecasts = $forecast->getForecast();
$days = $forecast->getDays();
$city = $forecast->getCity();

?>

<div class="form-container">
    <form action="" method="GET">
        <div class="input-control">
            <input type="search" name="q" placeholder="Rechercher une ville, un pays">
            <button type="submit"><i class="bi bi-search"></i></button>
        </div>
    </form>
</div>

<section class="wrapper">
    <div class="tabs">
        <button class="tab active">Aujourd'hui</button>

        <?php foreach($days as $day): ?>
        <button class="tab"><?= DateTranslater::translateDate($day["date"], "l") ?></button>
        <?php endforeach;?>
        
    </div>

    <div class="container">
        <h3 class="title"><?= $forecasts[0]["date"]->format("d M Y")?><span> à <?= $city ?></span> </h3>

        <h3>
            <span class="name"><?= WeatherTranslater::translateWeather($forecasts[0]["weather"])?> &bull;</span>&nbsp;&nbsp;<span class="desc"><?=$forecasts[0]["description"]?></span>
        </h3>


        <div class="card">
                                
            <div class="card-header">
                <p class="temp"><?=$forecasts[0]["temp"]?>°C<span class="feels-like">Ressenti : <?=$forecasts[0]["feels_like"]?>°C</span></p>

                <img class="weather-icon" src="http://openweathermap.org/img/wn/<?=$forecasts[0]["icon"]?>.png" alt="Image montrant l'état actuel des nuages">
            </div>
            
            <div class="details">
                <div>
                    <i class="bi bi-cursor-fill" style="transform: rotate(<?=$forecasts[0]["wind_dir"]?>deg);"></i>
                    <p>Direction du vent</p>
                </div>
                <div>
                <i class="bi bi-speedometer"></i>
                    <p>Vitesse : 30km/h</p>
                </div>
                <div>
                <i class="bi bi-moisture"></i>
                    <p>Humidité : <?=$forecasts[0]["humidity"]?></p>
                </div>
            </div>
        </div>

        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. In quam, dignissimos ab amet nesciunt vel error minima provident dolorem repudiandae vitae accusantium ut eaque at suscipit recusandae magni facere sapiente.</p>
    </div>
</section>

<!-- 3 Hours forecast -->

<section class="forecast">
    <h3 class="title">Prévisions à 3 heures</h3>

    <?php for($i=0; $i<3; $i++):?>
    <div class="card">
        <p class="hour"><?= $forecasts[$i]["date"]->format("H")?>H
            <span class="description"><?= $forecasts[$i]["description"] ?></span>
        </p>

        <p class="temp"><?= $forecasts[$i]["temp"]?>°C
            <span class="feels-like">Rés:<?= $forecasts[$i]["feels_like"]?>°C</span>               
        </p>

        <img class="weather-icon" src="http://openweathermap.org/img/wn/<?= $forecasts[$i]["icon"]?>.png" alt="Icône montrant l'état des nuages">
        
        <div class="wind">
            <i class="bi bi-cursor-fill" style="transform: rotate(<?=$forecasts[$i]["wind_dir"]?>deg);"></i>
            <p><?= $forecasts[$i]["wind_speed"]?>km/h</p>
        </div>
        <div class="precipitations">
            <i class="bi bi-droplet"></i>
            <p><?= $forecasts[$i]["pop"]?>%</p>
        </div>
    </div>
    <?php endfor;?>

</section>

<!-- 5 Days forecast -->

<section class="forecast daily-forecast">
    <h3 class="title">Prévisions de 5 prochains jours</h3>
    
    <?php foreach($days as $day):

        $description = $forecast->getDescription($day["date"]);
        $icon = $forecast->getIcon($day["date"]);
        $min_temp = $forecast->getMinTemp($day["date"]);
        $max_temp = $forecast->getMaxTemp($day["date"]);
        $wind_speed = $forecast->getWindSpeed($day["date"]);
        $pop = $forecast->getPop($day["date"]); 
    ?>
    
    <div class="card">
        <p class="hour"><?= DateTranslater::translateDate($day["date"], "D d M")?>
            <span class="description"><?= $description?></span>
        </p>

        <img class="weather-icon" src="http://openweathermap.org/img/wn/<?= $icon?>.png" alt="Image montrant l'état actuel des nuages">

        <p class="temp"><?= $min_temp . "°C | " . $max_temp . "°C"?> 
            <span class="feels-like">Min & Max</span>               
        </p>

        <div class="wind">
            <i class="bi bi-cursor-fill" style="transform: rotate(<?=$day["wind_dir"]?>deg);"></i>
            <p><?= $wind_speed?>km/h</p>
        </div>
        <div class="precipitations">
            <i class="bi bi-droplet"></i>
            <p><?= $pop?>%</p>
        </div>
    </div>
    <?php endforeach;?>
</section>
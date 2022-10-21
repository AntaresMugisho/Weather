<?php
    require "../vendor/autoload.php";
    require "../private/index.php";

    $city = "Bujumbura";
    $lang = "fr";
    $url = "http://api.openweathermap.org/data/2.5/forecast?q={$city}&lang={$lang}&appid=". API_KEY;

    var_dump($url);
    exit();

    $json = file_get_contents($url);
    $data = json_decode($json);
?>

<pre>
    <?php var_dump($data); ?> 
</pre>
    


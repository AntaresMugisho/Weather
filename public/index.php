<?php
    require "../vendor/autoload.php";
    require "../private/index.php";

    $city = "Bujumbura";
    $lang = "fr";
    // $url = "http://api.openweathermap.org/data/2.5/forecast?q={$city}&lang={$lang}&appid=". API_KEY;

    // $json = file_get_contents($url);
    // $data = json_decode($json);
    $data = file_get_contents("data.txt");
    // $data = json_decode($data);

    
?>

<pre>
    <?php var_dump($data); ?> 
</pre>
    


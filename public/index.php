<?php



    require "../vendor/autoload.php";
    require "../private/index.php";

    $city = "Bujumbura";
    $lang = "fr";
    $url = "http://api.openweathermap.org/data/2.5/forecast?q={$city}&lang={$lang}&appid=". API_KEY;

    // $json = file_get_contents($url);
    $json = file_get_contents("../private/data.json");
    $data = json_decode($json);

   
?>

<pre>
    <?php  var_dump($json);  ?> 
</pre>
    


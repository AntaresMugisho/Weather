<?php
    require "../vendor/autoload.php";

    $url = "http://api.openweathermap.org/data/2.5/forecast?q=Bujumbura&appid={$API_KEY}";
    $json = file_get_contents($url);

    $data = json_decode($json);
?>

<pre>
    <?php var_dump($data); ?> 
</pre>
    


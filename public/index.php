<?php

    require "../vendor/autoload.php";
    use App\Router;

    // Error reporter
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();


    // Router
    $TEMPLATE_PATH = dirname(__DIR__) . "/templates/";

    $router = new Router($TEMPLATE_PATH);
    $router
        ->get("/", "homepage", "home")
        ->run();
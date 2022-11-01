<?php

namespace App;

use \AltoRouter;

class Router{

    private $router;
    private $template_path;

    public function __construct(string $template_path)
    {
        $this->router = new AltoRouter;
        $this->template_path = $template_path;
    }

    public function get(string $slug, string $target, ?string $name = null): self
    {
        $this->router->map("GET", $slug, $target, $name);
        return $this;
    }

    public function run()
    {      
        $match =  $this->router->match();
    
        $template = $match['target'] ?? "E_404";

        if ($template === "E_404"){
            require $this->template_path . $template . ".php" ;
        }
        else{
            ob_start();
            require $this->template_path . $template . ".php";
            $content = ob_get_clean();
            
            require $this->template_path . "/layout.php";
        }
    }
}
<?php
namespace Controller;

use MVC\Router;
 
class HeronController{
    public static function Home(Router $router){
        $router->Render("heron/index");
    }
}

?>
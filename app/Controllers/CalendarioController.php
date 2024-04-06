<?php
namespace Controller;
use MVC\Router;
class CalendarioController{
    public static function Calendario(Router $router){
        $router->render("calendario_contenido");
    }
}

?>
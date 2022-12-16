<?php
namespace Controller;
use MVC\Router;

class TravelerController{
    public static function Get(Router $router){
        $router->Render("pagues/traveler");

    }
}
<?php
    namespace Controller;
    use MVC\Router;
    class PaguesController{
        public static function Home(Router $router){
            $router->Render("pagues/home");
        }
        public static function Traveler(Router $router){
            $router->Render("pagues/traveler");
        }
    }
?>
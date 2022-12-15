<?php
    namespace Controller;
    use MVC\Router;
    class PaguesController{
        public static function Inicio(Router $router){
            $router->Render("pagues/home");
        }
    }
?>
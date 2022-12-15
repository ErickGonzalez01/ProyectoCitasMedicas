<?php
    namespace Controller;
    use MVC\Router;
    class LoginController{
        public static function Start(Router $router){
            $router->Render("login/login");
        }
    }
?>

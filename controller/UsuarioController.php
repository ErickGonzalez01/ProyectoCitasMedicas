<?php
namespace Controller;
use MVC\Router;
use Model\Usuario;
    class UsuarioController{
        public static function Usuario(Router $router){
            $usuario = new Usuario($_POST);
            if($usuario->Login()==true){
                session_start();
                $_SESSION["correo"]=$usuario->correo;
                header("location: /home");
            }else{
                $router->RenderAPI($usuario->Login());
            }
            
        }
    }
?>
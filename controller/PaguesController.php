<?php
    namespace Controller;
    use MVC\Router;
    use Model\Paciente;
    class PaguesController{
        //[get]
        public static function Home(Router $router){
            $router->Render("pagues/home");
        }
        //[get]
        public static function Traveler(Router $router){            
            $router->Render("pagues/traveler");
        }//[post]
        public static function CreateTraveler(Router $router){
            //debuguear($_POST);
            $paciente = new Paciente($_POST);
            $estado=$paciente->Crear();
            $router->Render("pagues/traveler",["alerta"=>$estado]);
        }
    }
?>
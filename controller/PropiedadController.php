<?php
    namespace Controller;
    use MVC\Router;
    class PropiedadController{
        public static function Admin(Router $router){  
            debuguear($router);
            echo "Controller: bienbenido Admin";            
        }
        public static function Admin_Home(){
            echo "Controller: bienbenido Admin_Home";           
        }
        public static function Home(){
            echo "Controller: bienbenido Home";
        }     
        public static function Login(){
            echo "Controller: bienbenido Login";
        }
        public static function Citas(){
            echo "Controller: bienbenido Citas";
        }
        public static function Reportes(){
            echo "Controller: bienbenido Reporte";
        }
        //----------------CALENDARIO----------------//
        public static function Calendario(Router $router){
            $router->render("calendario_contenido");
        }
    }
?>
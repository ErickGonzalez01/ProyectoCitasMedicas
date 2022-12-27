<?php
namespace Controller;
use Model\Cita;
use MVC\Router;
class CitaController{
    //POST
    public static function Crear(Router $router){
        $cita = new Cita($_POST);
        $router->RenderAPI($cita->Crear());
    }
    //GET
    public static function Listar(Router $router){        
        $router->RenderAPI(Cita::Listar($status=false));
    }
}


?>
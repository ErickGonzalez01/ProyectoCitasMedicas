<?php
namespace Controller;

use Model\Paciente;
use MVC\Router;

class PacienteController{
    public static function Crear(Router $router){      
        $pacienteInstance= new Paciente(\file_get_contents("php://input"));
        $result=$pacienteInstance->Crear();
        $router->renderAPI($result);        
    }
    public static function GetPaciente(Router $router){
        //debuguear($_GET);
        $resultado = new Paciente();
        $resultado->GetPaciente($_GET["id"]);
        $router_>renderAPI($resultado);
    }
}
?>
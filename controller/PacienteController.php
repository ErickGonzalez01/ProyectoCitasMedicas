<?php
namespace Controller;

use Model\Paciente;
use MVC\Router;

class PacienteController{
    public static function Get(Router $router){
        $router->Render("pagues/paciente",["active"=>"paciente"]);
    }

    public static function Crear(Router $router){    
        //debuguear($_POST);
        $paciente= new Paciente($_POST);
        $result=$paciente->Crear();
        $router->Render("pagues/paciente",["alerta"=>$result]);
    }
    public static function GetPaciente(Router $router){
        //debuguear($_GET);
        $resultado = Paciente::GetPaciente($_GET["id"]);
        $router->renderAPI($resultado);
    }
    public static function GetAllPaciente(Router $router){
        //debuguear($_GET);
        $resultado = Paciente::GetAllPaciente();
        $router->renderAPI($resultado);
    }
    public static function Delete(Router $router){   
        $resultado = Paciente::Delete(file_get_contents("php://input"));
        $router->renderAPI($resultado);
    }
    public static function Busqueda(Router $router){   
        $resultado = Paciente::Busqueda(file_get_contents("php://input"));
        $router->renderAPI($resultado);
    }
}
?>
<?php
namespace Controller;

use Model\Paciente;
use MVC\Router;
use Model\Cita;

class PacienteController{
    public static function Get(Router $router){

        $router->Render("pagues/paciente",["sider"=>["paciente"=>"active"]]);
    }

    public static function Crear(Router $router){    
        //debuguear($_POST);
        $cedula=$_POST["cedula"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $fecha_nacimiento=$_POST["fecha_nacimiento"];
        $telefono=$_POST["telefono"];
        $errores=[];

        //validacion
        if(empty($cedula)){
            $errores[]="EL campo cedula no puede estar vacio";
        }
        if(strlen($cedula)!=16){
            $errores[]="El campo cedula debe contener valores validos.";
        }

        if(empty($nombre)){
            $errores[]="El campo nombre esta vacio";
        }

        if(empty($apellido)){
            $errores[]="EL campo apellido esta vacio.";
        }

        if(empty($fecha_nacimiento)){
            $errores[]="Fecha de nacimiento es requerido";
        }
        
        if(empty($telefono)){
            $errores[]="El numero de telefono esta vacio";
        }
    
        if(empty($errores)){
            $paciente= new Paciente($_POST);
            $estado=$paciente->Crear();
            if($estado[0]===true){
                $errores[]="Se guardo correctamente.";
                $paciente=Paciente::GetPacienteId($estado[1]);
                $router->Render("pagues/paciente",["errores"=>$errores,"estado"=>true,"sider"=>["paciente"=>"active"],"paciente"=>$paciente]);
            }else{
                $errores[]=$estado;
                $router->Render("pagues/paciente",["errores"=>$errores,"estado"=>false,"sider"=>["paciente"=>"active"]]);
            }
            //$errores[]="Se guardo correctamente.";
            //$router->Render("pagues/paciente",["errores"=>$errores,"estado"=>true,"sider"=>["paciente"=>"active"]]);
        }else{
            $router->Render("pagues/paciente",["errores"=>$errores,"post"=>$_POST,"estado"=>false,"sider"=>["paciente"=>"active"]]);
        }
      
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
        //debuguear(json_encode($_POST));
        $resultado = Paciente::Busqueda(file_get_contents("php://input"));
        $router->renderAPI($resultado);
    }
    public function lista_pacientes(){
        
    }

}
?>
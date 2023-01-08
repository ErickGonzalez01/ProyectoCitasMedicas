<?php
namespace Controller;
use MVC\Router;
use Model\Cita;
use Model\Servicio;

class TravelerController{
    //[Router("/traveler"),Method("GET")]
    public static function Get(Router $router){
        $servicios=Servicio::Listar();
        $router->Render("pagues/traveler",["sider"=>["cita"=>"active"],"servicios"=>$servicios]);
    }

    //[Router("/traveler"),Method("POST")]
    public static function Crear(Router $router){
        //debuguear($_POST);        
        $id_paciente=$_POST["id_paciente"];
        $id_servicio=$_POST["id_servicio"];
        $fecha_cita=$_POST["fecha_cita"];        
        $errores=[];

        //debuguear($_POST);

        if(empty($id_paciente)){
            $errores[]="El id del paciente es requerido";
        }
        if(empty($fecha_cita)){
            $errores[]="El campo fecha de la cita es requerido";
        }
        if(empty($id_servicio)){
            $errores[]="Debe seleccionar un servicio especifico";
        }
        $servicios=Servicio::Listar();
        if(empty($errores)){
            $cita = new Cita($_POST);
            $status=$cita->Crearcitas();
            if($status===true){
                $errores[]="Se guardo con exito la cita";
                $router->Render("pagues/traveler",["status"=>$status,"errores"=>$errores,"servicios"=>$servicios]);
            }elseif($status===false){
                $errores[]="No hay citas disponibles";                
                $router->Render("pagues/traveler",["status"=>false,"errores"=>$errores,"servicios"=>$servicios]);
            }else{
                $errores[]=$status;                
                $router->Render("pagues/traveler",["status"=>false,"errores"=>$errores,"servicios"=>$servicios]);
            }
        }else{
            $status=false;            
            $router->Render("pagues/traveler",["status"=>$status,"errores"=>$errores,"servicios"=>$servicios,"form"=>$_POST]);
        }      
    }
}
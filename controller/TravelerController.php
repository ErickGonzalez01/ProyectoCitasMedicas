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
        $fecha_cita=$_POST["fecha_cita"];
        $hora_cita=$_POST["hora_cita"];
        $errores=[];

        if(empty($id_paciente)){
            $errores[]="El id del paciente es requerido";
        }
        if(empty($fecha_cita)){
            $errores[]="El campo fecha de la cita es requerido";
        }
        if(empty($hora_cita)){
            $errores[]="Debe especificar una hora valida";
        }

        if(empty($errores)){
            $cita = new Cita(["id_paciente"=>$id_paciente,"fecha_cita"=>$fecha_cita,"hora_cita"=>$hora_cita]);
            $status=$cita->Crearcitas();
            if($status){
                $status=true;
                $errores[]="Se guardo con exito el paciente";
                $router->Render("pagues/traveler",["status"=>$status,"errores"=>$errores]);
            }else{
                $status=false;
                $errores[]="No hay citas disponibles";
                $router->Render("pagues/traveler",["status"=>$status,"errores"=>$errores]);
            }
        }else{
            $status=false;
            $router->Render("pagues/traveler",["status"=>$status,"errores"=>$errores]);
        }      
    }
}
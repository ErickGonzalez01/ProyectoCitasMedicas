<?php
namespace Controller;
use MVC\Router;
use Model\Cita;
use Model\Paciente;
use Model\Servicio;


class TravelerController{

    public static function CitaCreada(Router $router){
        $id=$_GET["id"];
        $datos=["cita"=>$citas = Cita::GetCitaId($id)];

        return $router->RenderPague("info/confirmar_cita",$datos);
    }

    //[Router("/traveler"),Method("GET")]
    public static function Get(Router $router){
        $servicios=Servicio::Listar();
        $router->Render("pagues/traveler",[
            "sider"=>["cita"=>"active"],
            "servicios"=>$servicios
        ]);
    }
    // [route("get"=>"/programarcitaid")]
    public static function GetIdPaciente(Router $router){
        $intIdPaciente= $_GET["id"];
        $arrayServicios=Servicio::Listar();
        $objPaciente=Paciente::GetPacienteId($intIdPaciente);
        if(!is_null($objPaciente)){
            $router->Render("pagues/traveler",[
                "sider"=>["cita"=>"active"],
                "servicios"=>$arrayServicios,
                "paciente"=>$objPaciente
            ]);
        }else{
            header("location: /traveler");
        }
        
    }

    //[Router("/traveler"),Method("POST")]
    public static function Crear(Router $router){
        //debuguear($_POST); 
        $data=[
            "id_paciente"=>$_POST["paciente_id"] ?? "",
            "id_servicio"=>$_POST["id_servicio"] ?? "",
            "fecha_cita"=>$_POST["fecha_cita"] ?? ""
        ];

        //debuguear($_POST);

        if(empty($data["id_paciente"])){
            $errores[]="El id del paciente es requerido";
        }
        if(empty($data["fecha_cita"])){
            $errores[]="El campo fecha de la cita es requerido";
        }
        if(!empty($data["id_servicio"])){
            if(!is_numeric($data["id_servicio"])){
                $errores[]="Debe seleccionar un servicio especifico";
            }
        }
        $servicios=Servicio::Listar();
        if(empty($errores)){
            $cita = new Cita($data);
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
            $objPaciente=Paciente::GetPacienteId($data["id_paciente"]);
            $router->Render("pagues/traveler",[
                "sider"=>["cita"=>"active"],
                "paciente"=>$objPaciente,
                "status"=>$status,
                "errores"=>$errores,
                "servicios"=>$servicios,
                "form"=>$_POST]                
            );
        }      
    }
}
<?php
namespace Controller;
use Model\Cita;
use MVC\Router;
use Model\Servicio;

class CitaController{
    //POST
    public static function Crear(Router $router){
        $cita = new Cita($_POST);
    }
    //GET
    public static function Listar(Router $router){        
        $router->RenderAPI(Cita::Listar($status=false));
    }
    //"listarcita"
    public static function Listar_Citas_Star(Router $router){
        $lista_de_citas = Cita::Busqueda();
        $lista_servicios=Servicio::ListarShow();
        $data=[
            "servicios"=>$lista_servicios,
            "citas"=>$lista_de_citas,
            "sider"=>[
                "citas_programadas"=>"active"
                ]
        ];

        return $router->Render("pagues/listar_citas",$data);
    }
    public static function Filtro(Router $router){

        $date = $_POST["date"]?? "";
        $servicio = $_POST["servicio"] ?? "";
        $busqueda = $_POST["busqueda"] ?? "";

        $fill = Cita::Filtro([$date,$servicio,$busqueda]);

        //debuguear($_POST);
        $router->RenderAPI(json_encode($fill));
    }
}


?>
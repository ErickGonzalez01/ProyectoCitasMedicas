<?php
namespace Controller;
use Model\Cita;
use MVC\Router;
class CitaController{
    //POST
    public static function Crear(Router $router){
        $cita = new Cita($_POST);
    }
    //GET
    public static function Listar(Router $router){        
        $router->RenderAPI(Cita::Listar($status=false));
    }

    public static function Listar_Citas_Star(Router $router){
        $lista_de_citas = Cita::Busqueda();
        $router->Render("pagues/listar_citas",["citas"=>$lista_de_citas,"sider"=>["citas_programadas"=>"active"]]);
    }
}


?>
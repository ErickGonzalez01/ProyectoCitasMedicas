<?php

namespace Controller;

use Model\Servicio;
use MVC\Router;
use App\Validacion;

class ServicioController extends Validacion{

    public static function listaServicio(Router $route){
        $data=[
            "lista_servicio"=>array_map(function($data){return (object)$data;}, Servicio::ListarSHow()),
            "sider"=>["listar_servicio"=>"active"],
            "menu"=>true,
            "servicio"=>true
        ];
        $route->render("servicio/servicio_lista",$data);
    }

    public static function nuevoServicio(Router $router){
        $data=[
            "sider"=>["nuevo_servicio"=>"active"],
            "menu"=>true,
            "servicio"=>true
        ];
        $router->Render("servicio/servicio_nuevo",$data);
    }

    public static function Guardar(){
        $data= $_POST;
        $errores=[];

        if(empty($data["nombre_servicio"])){
            $errores[]="Nombre del servicio es requerido";
        }
        if(empty($data["descripcion"])){
            $errores[]="descripcion es requerido";
        }
        if(empty($data["detalle"])){
            $errores[]="Detalle es requerido";
        }else{}
        if(empty($data["hora_inicio_servicio"])){
            $errores[]="Hora de inicio es requerido";
        }
        if(empty($data["hora_fin_servicio"])){
            $errores[]="Hora de finde servicio es requerido";
        }
        if(empty($data["ciclo_citas_dia"])){
            $errores[]="Ciclo de citas por dia es requerido";
        }
        if(empty($data["ciclos_citas_fin_de_semana"])){
            $errores[]="Ciclo de citas durante el fin de semana es requerido";
        }
        if(empty($data["duracion_cita"])){
            $errores[]="Duracio de cita es requerido";
        }
        if(empty($data["duracion_cita_lote"])){
            $errores[]="Duracion de citas por lote es requerido y debe ser menor a la duracion de las citas";
        }
        if(empty($data["fin_de_semana"])){
            $errores[]="El campo fin de semana es requerido, ya que se especifica si se va a dar servicio";
        }

        $boolValidacion = self::Validations([
            "nombre_servicio"=>"required|max_lenght[25]|is_Numeric"
        ]);

        if($boolValidacion===true){
            echo "validacion exitosa";
        }else{
            debuguear(self::getErrorder());
            
        }

        //$est=self::Val_String($data["nombre_servicio"],["nombre_servicio"]);
        //debuguear($data);
    }
}

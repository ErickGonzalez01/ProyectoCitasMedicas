<?php

namespace Controller;

use Model\Servicio;
use MVC\Router;


class ServicioController{

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
        debuguear($_POST);
    }
}

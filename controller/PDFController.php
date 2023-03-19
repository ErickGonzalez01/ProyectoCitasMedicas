<?php
namespace Controller;
use App\TCPDF\ConfirmarCitaPDF;
use MVC\Router;
use App\Validacion;
class PDFController{
    public static function CitaMedica(){
        $data=$_POST;
        $boolValidacion=Validacion::Validations([
            "nombre"=>"required",
            "apellido"=>"required",
            "fecha_cita"=>"required",
            "hora_cita"=>"required",
            "servicio"=>"required"
        ]);
        if($boolValidacion){
            ConfirmarCitaPDF::Start($data);
        }else{
            echo "404";
        }
    }
}
?>
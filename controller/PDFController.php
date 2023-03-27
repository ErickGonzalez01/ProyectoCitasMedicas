<?php
namespace Controller;
use App\tcpdf\ConfirmarCitaPDF;
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

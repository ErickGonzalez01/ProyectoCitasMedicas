<?php

namespace CitasMedicas\Controllers;

use CitasMedicas\PDF\ConfirmarCitaPdf;

class PDFController extends BaseController{

    public function CitaMedica(){

        $data = $this->request->getPost(); //$_POST;

        $boolValidacion=$this->validate([
            "nombre"=>"required",
            "apellido"=>"required",
            "fecha_cita"=>"required",
            "hora_cita"=>"required",
            "servicio"=>"required"
        ]);

        if(!$boolValidacion){
            echo "404";
        }
        
        //$this->response->setHeader("Content-Type", "application/pdf");

        $pdf = new ConfirmarCitaPdf();
        $pdf->Start($data); 

        return $this->response->download($pdf->Start($data));
    }
}
?>

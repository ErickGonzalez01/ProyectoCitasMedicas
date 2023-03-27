<?php 

namespace App\tcpdf;

use TCPDF;

// require_once "./../vendor/tecnickcom/tcpdf/tcpdf.php";
// use TCPDF;

class ConfirmarCitaPDF{
    /**
     * 
     * @nombre
     */
    public static function Start(array $datos){
        $nombre=$datos["nombre"];
        $apellido=$datos["apellido"]??"";
        $fecha_cita=$datos["fecha_cita"];
        $hora_cita=$datos["hora_cita"];
        $servicio=$datos["servicio"];
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION,PDF_UNIT,PDF_PAGE_FORMAT,true,"UTF-8",false,false);
        //$pdf = new TCPDF()
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Erick Gonzalez');
        $pdf->SetTitle('Generador de pdf con TCPDF');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        // set text shadow effect
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

        // Set some content to print
        $html = <<<EOD
        <div style="
        margin: 0px auto;
        border-width: 2px;
        border-style: solid;
        border-color: rgb(128, 124, 124);
        border-radius: 10px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        ">
        <div style="background: #e9e6e6;
            margin: 0px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            ">
            <h3 style="padding-top: 10px;
                margin: 0px 10px;
                ">Su cita esta programada</h3></div>
        <div>
            <h4>Detalles de su citas</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, rem vitae atque accusamus
                dicta exercitationem sit nobis nemo autem perspiciatis fuga, provident distinctio quae natus
                consequuntur iure velit vel voluptate!</p>
            <div style="
                display: flex;
                flex-direction: column;
                gap: 15px;
                margin: 0px 20px;
                margin-bottom: 20px;
             ">
                <div style="display: flex; justify-content: space-between; border: 2px solid #e9e6e6; border-radius: 5px; padding: 5px;">
                    <label class="form-label">Nombre:</label>
                    <label class="form-control">
                       $nombre
                    </label>
                </div>
                <div style="display: flex; justify-content: space-between; border: 2px solid #e9e6e6; border-radius: 5px; padding: 5px;">
                    <label class="form-label">Apellido:</label>
                    <label class="form-control">
                        $apellido
                    </label>
                </div>
                <div style="display: flex; justify-content: space-between; border: 2px solid #e9e6e6; border-radius: 5px; padding: 5px;">
                    <label class="form-label">Fecha de su citas:</label>
                    <label class="form-control">
                        $fecha_cita
                    </label>
                </div>
                <div style="display: flex; justify-content: space-between; border: 2px solid #e9e6e6; border-radius: 5px; padding: 5px;">
                    <label class="form-label">Hora de su citas:</label>
                    <label class="form-control">
                        $hora_cita
                    </label>
                </div>
                <div style="display: flex; justify-content: space-between; border: 2px solid #e9e6e6; border-radius: 5px; padding: 5px;">
                    <label class="form-label">Servicio:</label>
                    <label class="form-control">
                        $servicio
                    </label>
                </div>
            </div>
        </div>
        <div style="
            background: #e9e6e6;
            padding: 10px 5px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            ">
            <p style="margin: 0px;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem quos sunt voluptatum delectus nemo, at iure ipsum obcaecati aspernatur odio fuga tempora illo laboriosam nihil quia quo tempore quaerat. Adipisci!</p>
        </div>
        </div>       
        EOD;
        // Print text using writeHTMLCell()
        //$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $pdf->writeHTML($html);

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('Citas_informations.pdf', 'I');
    }
}

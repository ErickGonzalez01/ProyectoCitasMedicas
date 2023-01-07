<?php

namespace Model;

use App\ConfigDB;
use DateTime;
use mysqli_sql_exception;
use DateInterval;

class Cita
{
    public $id;
    public $id_paciente;
    public $id_servicio;
    public $fecha_registro;
    public $fecha_cita;
    public $hora_cita;
    public $status_cita;
    public $duracion_cita;
    public $citas_lote;
    public $ciclo_servicio;

    public function __construct($cita)
    { // implementar real escape mas adelante         
        $this->id_paciente = $cita["id_paciente"] ?? "";
        $this->id_servicio = $cita["id_servicio"]?? "";
        $this->fecha_registro = date("Y-m-d")?? "";
        $this->fecha_cita = $cita["fecha_cita"]?? "";
        $this->hora_cita = $cita["hora_cita"]?? "";
        $this->status_cita = "Activa"?? "";
        $this->duracion_cita = $cita["duracion_cita"]?? "";
        $this->citas_lote = $cita["citas_lote"]?? "";
        $this->ciclo_servicio = $cita["ciclo_servicio"]?? "";
    }
  
    private function Establecer_Hora_De_La_Cita($fecha_cita,$id_servicio,$ciclo){
        $sql="select max(addtime(hora_cita, sec_to_time(duracion_cita*60))) as max_hora from citas_medicas WHERE fecha_cita='$fecha_cita' and id_servicio=$id_servicio and ciclo_servicio=$ciclo";
        //debuguear($sql);
        $resultado = ConfigDB::Get()->query($sql);
        return $resultado->fetch_object()->max_hora;
    }
    private function Consultar_Citas_Actuales($id_servicio, $fecha_cita, $ciclo){
        $sql_consutar_citas_actuales = "select hora_cita as hora,ciclo_servicio as ciclo, duracion_cita from citas_medicas where id_servicio=1 and fecha_cita='2023-01-01'";
        $resultado = ConfigDB::Get()->query($sql_consutar_citas_actuales);
        $array_citas_actuales = $resultado->fetch_all(MYSQLI_ASSOC);
        debuguear($array_citas_actuales);
        return true;
    }
    private function Consultar_Servicio($id_servicio){
        $sql_ciclo_servicio = "SELECT * FROM servicios WHERE id=$id_servicio";
        $resultado = ConfigDB::Get()->query($sql_ciclo_servicio);
        $obj_ciclo_servicio = $resultado->fetch_object();
        return $obj_ciclo_servicio;
    }
    
    public function Crearcitas(){
        date_default_timezone_set("America/Managua");
        $servicio=$this->Consultar_Servicio(1); //objeto servicio
        $servicio_ciclo_dia= intval($servicio->ciclo_citas_dia); //ciclos del servicio para la semana
        $servicio_ciclo_fin_de_semana=intval($servicio->ciclos_citas_fin_de_semana); //ciclo fin de semana
        $servicio_hora_final = $servicio->hora_fin_servicio; //hora final del servicio
        $servicio_duracion=intval($servicio->duracion_cita);
        $hora_fija="";
        $i=1;
        $errores=[];
        $dia_de_la_semana=["Lunes","Martes","Miercoles","Jueves","viernes","Sabado","Domingo"];
        while(true){
            if($this->Establecer_Hora_De_La_Cita("2023-01-03",1,$i)==null){
                $hora_fija=$servicio->hora_inicio_servicio;
                break;
            }else{
                $max_hora= $this->Establecer_Hora_De_La_Cita("2023-01-03",1,$i);
                $val=strtotime($max_hora) + ($servicio_duracion*60);
                $dateval=date("h:i:sa",$val);
                if($val < strtotime($servicio_hora_final)){
                    $datetime= date($max_hora);
                    $date_mas1mm = date("h:i:sa",strtotime($datetime."+1 minute"));
                    $hora_fija=$date_mas1mm;
                    break;
                }else{
                    if(date("N",strtotime("2023-01-01"))>5){
                        if($servicio_ciclo_fin_de_semana>$i){
                            $errores[]="No hay citas disponibles en la fecha selecionada";
                            break;
                        }
                        $i++;
                    }
                    if(date("N",strtotime("2023-01-01"))<=5){
                        if($servicio_ciclo_dia>$i){
                            $errores[]="No hay citas disponibles en la fecha selecionada";
                            break;
                        }
                        $i++;
                    }
                    
                }
            }             
        } 
        //Validacion de campos a guardar
        $id=$this->id;
        $id_paciente=$this->id_paciente;
        $id_servicio=$this->id_servicio;
        $fecha_registro=$this->fecha_registro;
        $fecha_cita=$this->fecha_cita;
        $hora_cita=$this->hora_cita;
        $status_cita=$this->status_cita;
        $duracion_cita=$this->duracion_cita;
        $citas_lote=$this->citas_lote;
        $ciclo_servicio=$this->ciclo_servicio;

        if(empty($id_paciente)){
            $errores[]="id del paciente esta vacio";
        }
        if(empty($id_servicio)){
            $errores[]="id del servicio esta vacio";
        }
        if(empty($fecha_registro)){
            $errores[]="No se encontro fech de registro";
        }
        if(empty($fecha_cita)){
            $errores[]="No hay fecha de cita";
        }
        if(empty($hora_cita)){
            $errores[]="hora de cita esta vacio";
        }
        if(empty($status_cita)){
            $errores[]="estado de la cita esta vacio";
        }
        if(empty($duracion_cita)){
            $errores[]="duracion de la cita no establecido";
        }
        if(empty($citas_lote)){
            $errores[]="citas por lote no existe";
        }
        if(empty($ciclo_servicio)){
            $errores[]="ciclo del servicio desconocido";
        }

        $errores[]="inicio del servicio =>".$servicio->hora_inicio_servicio;

        $errores[]="Ciclo del servicio =>".$i;

        $errores[]="hora de la cita =>". $hora_fija;

        $errores[]="03-01-2023";
        
        $errores[]="Horin fin del servicio =>". date("h:i:sa",strtotime($servicio_hora_final));

        $errores[]=date("h:i:sa",strtotime($max_hora));

        debuguear($errores);


    }

    public function CrearCitasPorLotes()
    {
    }
    public static function Listar()
    {
        $sql = "select *from citas_medicas";
        try {
            $result = ConfigDB::Get()->query($sql);
            ConfigDB::Close();
            header("content-type:aplicacion/json");
            http_response_code(200);
            return json_encode($result->fetch_all(MYSQLI_ASSOC));
        } catch (mysqli_sql_exception $th) {
            header("content-type:aplicacion/json");
            http_response_code(404);
            return json_encode($th->getMessage());
        }
    }
}

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
        $this->id_paciente=$cita["id_paciente"];
        $this->id_servicio = $cita["id_servicio"]?? "";
        $this->fecha_registro = date("Y-m-d");
        $this->fecha_cita = $cita["fecha_cita"]?? "";
        $this->status_cita = "Activa"?? "";
        $this->citas_lote = $cita["citas_lote"]?? 0;
    }

    public static function GetCitaId($id): array{
        $sql="call obtener_cita_id($id);";
        $respuesta=ConfigDB::Get()->query($sql);
        return $respuesta->fetch_array(MYSQLI_ASSOC);
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
        //debuguear($array_citas_actuales);
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
        $estado=true;
        $ciclo_actual="";
        while(true){
            if($this->Establecer_Hora_De_La_Cita($this->fecha_cita,$this->id_servicio,$i)==null){
                $hora_fija=$servicio->hora_inicio_servicio;
                break;
            }else{
                $max_hora= $this->Establecer_Hora_De_La_Cita($this->fecha_cita,$this->id_servicio,$i);
                $val=strtotime($max_hora) + ($servicio_duracion*60);
                //$dateval=date("h:i:sa",$val);
                if($val < strtotime($servicio_hora_final)){
                    $datetime= date($max_hora);
                    $date_mas1mm = date("h:i:sa",strtotime($datetime."+1 minute"));
                    $hora_fija=$date_mas1mm;
                    break;
                }else{
                    if(date("N",strtotime("2023-01-01"))>5){
                        if($servicio_ciclo_fin_de_semana>$i){
                            $estado=false;
                            break;
                        }
                        $i++;
                    }
                    if(date("N",strtotime("2023-01-01"))<=5){
                        if($servicio_ciclo_dia>$i){
                            $estado=false;
                            break;
                        }
                        $i++;
                    }
                    
                }
            }             
        } 
        //Insertar nueva cita
        $sql="INSERT INTO citas_medicas(id_paciente,id_servicio,fecha_registro,fecha_cita,hora_cita,status_cita,duracion_cita,ciclo_servicio) VALUE($this->id_paciente,$this->id_servicio,'$this->fecha_registro','$this->fecha_cita','$hora_fija','$this->status_cita',$servicio_duracion,$i)";
        
        if($estado){
            try {
                //$resultado=ConfigDB::Get()->query($sql);
                $conn=ConfigDB::Get();
                $resultado = $conn->query($sql);  //->query($sql);
                $id = $conn->insert_id;
                return [$resultado,$id];
            } catch (mysqli_sql_exception $th) {
                $resultado=$th->getMessage();
                return $resultado;
            }
        }else{
            return $estado;
        }
    }
    public function CrearCitasPorLotes(){
    }
    public static function Listar(){
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
    public static function Busqueda($argumentos=[]){
        date_default_timezone_set("America/Managua");
        $hoy = date("Y-m-d");
        //debuguear($hoy);
        $sql="select cm.id, p.nombre, p.apellido, s.nombre_servicio, cm.fecha_registro, cm.fecha_cita, cm.hora_cita, cm.status_cita from citas_medicas as cm inner join servicios as s on cm.id_servicio = s.id inner join pacientes as p on cm.id_paciente=p.id";// where fecha_cita="."'$hoy'";
        /*foreach($argumentos as $parametro=> $value){
            $sql += $$parametro."=".$value . "";
        }*/
        $resultado = ConfigDB::Get()->query($sql);
        $array_citas_get = $resultado->fetch_all(MYSQLI_ASSOC);
        return $array_citas_get;
    }
    public static function Filtro($parametro=[]){
        //debuguear($parametro);

        $sql="select cm.id, p.nombre, p.apellido, s.nombre_servicio, cm.fecha_registro, cm.fecha_cita, cm.hora_cita, cm.status_cita from citas_medicas as cm inner join servicios as s on cm.id_servicio = s.id inner join pacientes as p on cm.id_paciente=p.id";
        
        if(!empty($parametro[0]) || !empty($parametro[1]) || !empty($parametro[2])){ //agregando el where
            $sql.=" where";
        }

        if(!empty($parametro[0])){ //fecha
            $sql.=" cm.fecha_cita='".$parametro[0]."'";              
        }

        if(!empty($parametro[1])){ //servicio  
            if(!empty($parametro[0])){
                $sql.=" and cm.id_servicio='".$parametro[1]."'";
            }else{
                $sql.=" cm.id_servicio='".$parametro[1]."'";
            }         
            
        }

        if(!empty($parametro[2])){ //busqueda
            if(!empty($parametro[0]) || !empty($parametro[1])){
                $sql.=" and p.nombre like '%".$parametro[2]."%' or p.apellido like '%".$parametro[2]."%'"; 
            }else{
                $sql.=" p.nombre like '%".$parametro[2]."%' or p.apellido like '%".$parametro[2]."%'"; 
            }    
        }

        $respuesta=ConfigDB::Get()->query($sql);

        $array = $respuesta->fetch_all(MYSQLI_ASSOC);

        return $array; //debuguear($array);
    }
    
}

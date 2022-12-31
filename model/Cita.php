<?php
namespace Model;
use App\ConfigDB;
use mysqli_sql_exception;

class Cita{
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

    public function __construct($cita){ // implementar real escape mas adelante         
        $this->id_paciente =$cita["id_paciente"];
        $this->id_servicio=$cita["id_servicio"];
        $this->fecha_registro=date("Y-m-d");
        $this->fecha_cita=$cita["fecha_cita"];
        $this->hora_cita=$cita["hora_cita"];
        $this->status_cita="Activa";
        $this->duracion_cita=$cita["duracion_cita"];
        $this->citas_lote=$cita["citas_lote"];
        $this->ciclo_servicio=$cita["ciclo_servicio"];
    }
    private function ConsultarCitaDisponible($id_paciente, $fecha_cita, $hora_cita,$servicio){
        $sql = "";
        return true;
    }
    private function MaxHora($fecha_cita, $ciclo_servicio, $id_servicio){
        //Consultar ciclos del servicio;
        $sql_servicios="select ciclo_citas_dia,ciclos_citas_fin_de_semana from servicios where id=$id_servicio;"
        $ciclo=ConfigDB::Get()->query($sql_servicios)->fetch_array(MYSQLI_ASSOC);
        $ciclo_semana=$ciclo["ciclo_citas_dia"];
        $ciclo_fin_semana["ciclos_citas_fin_de_semana"];

        if()

        //Consultar hora maxima
        $sql="select max(addtime(hora_cita, sec_to_time(duracion_cita*60))) as max_hora from citas_medicas where fecha_cita=".$fecha_cita." and id_servicio=$id_servicio and ciclo_servicio=$ciclo_servicio;";
        $max_hora=ConfigDB::Get()->query($sql)->fetch_array(MYSQLI_ASSOC);
    }
    //Crear una cita
    public function Crearcitas(){
        //consultar cita Maxima
        $this->MaxHora($this->fecha_cita,$this->ciclo_servicio,$this->id_servicio)
         //Consultar citas
         //$sql="SELECT * FROM citas_medicas WHERE id_paciente= $this->id_paciente AND fecha_cita='$this->fecha_cita' AND hora_cita='$this->hora_cita' AND status_cita ='activa'";

         $numeroElementos=4; 
         $citaDisponible=true;
         try {
            $sql="SELECT id_paciente FROM citas_medicas WHERE fecha_cita='$this->fecha_cita' AND hora_cita='$this->hora_cita' AND status_cita ='activa'";
            $resultado = ConfigDB::Get()->query($sql);
            $numeroElementos= $resultado->num_rows;
            $array = $resultado->fetch_all(MYSQLI_ASSOC);
            foreach($array as $id){
                if($id["id_paciente"]==$this->id_paciente){
                    $citaDisponible=false;
                    break;
                }
            }
         } catch (mysqli_sql_exception $th) {
            header("content-type:aplication/json");
            http_response_code(400);
            return json_encode($th->getMessage());
         }   
         
         // Validar si hay citas disponibles crear citas se valida contando el numero de 
         //citas de una fecha y hora, si hay menos de 4 citas entonces se creara, pero 
         //si hay 4 entonces no se creara la cita
         if($numeroElementos<4 and $citaDisponible==true){
            $sql = "INSERT INTO citas_medicas(id_paciente,fecha_registro,fecha_cita,hora_cita,status_cita) VALUE('$this->id_paciente','$this->fecha_registro','$this->fecha_cita','$this->hora_cita','$this->status_cita');";
            try {
                $resultado = ConfigDB::Get()->query($sql);
                return $resultado;                          
            } catch (mysqli_sql_exception $th) {            
                return $th->getMessage();                
            }
         }else{
            return false;
         }
        
    }
    public function CrearCitasPorLotes(){

    }
    public static function Listar(){
        $sql="select *from citas_medicas";        
        try {
            $result= ConfigDB::Get()->query($sql);
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
?>
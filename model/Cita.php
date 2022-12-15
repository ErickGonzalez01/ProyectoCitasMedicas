<?php
namespace Model;
use App\ConfigDB;
use mysqli_sql_exception;

class Cita{
    public $id;
    public $id_paciente;
    public $fecha_registro;
    public $fecha_cita;
    public $hora_cita;
    public $status_cita;

    public function __construct($citas){
        $json = json_decode($citas,true);
        $this->id_paciente =$json["id_paciente"];
        $this->fecha_registro=$json["fecha_registro"];
        $this->fecha_cita=$json["fecha_cita"];
        $this->hora_cita=$json["hora_cita"];
        $this->status_cita="Activa";
    }
    //Crear una cita
    public function Crear(){

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
                header("Content-Type:aplication/json");
                http_response_code(200);
                return json_encode($resultado);                          
            } catch (mysqli_sql_exception $th) {            
                header("Content-Type:aplication/json");
                http_response_code(404);
                return json_encode($th->getMessage());                
            }
         }else{
            header("content-type:aplication/json");
            http_response_code(400);
            return "no hay citas disponibles";
         }
        
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
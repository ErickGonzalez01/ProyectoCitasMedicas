<?php
namespace Model;
use App\ConfigDB;

class Servicio{
    public $id;
    public $nombre_servicio;
    public $descripcion;
    public $detalle;
    public $hora_inicio_servicio;
    public $hora_fin_servicio;
    public $ciclo_citas_dia;
    public $ciclo_citas_fin_de_semana;
    public $duracion_cita;
    public $duracion_cita_lote;
    public $fin_de_semana;

    public function __construct($servicio){  //agregar mysql real escape
        $this->id=$servicio["servicio"];
        $this->nombre_servicio=$servicio["nombre_servicio"];
        $this->descripcion=$servicio["descripcion"];
        $this->detalle=$servicio["detalle"];
        $this->hora_inicio_servicio=$servicio["hora_inicio_servicio"];     
        $this->hora_fin_servicio=$servicio["hora_fin_servicio"];
        $this->ciclo_citas_dia=$servicio["ciclo_citas_dia"];
        $this->ciclo_citas_fin_de_semana=$servicio["ciclo_citas_fin_de_semana"];
        $this->duracion_cita=$servicio["duracion_cita"];
        $this->duracion_cita_lote=$servicio["duracion_cita_lote"];
    }

    public static function Listar(){
        $sql="select * from servicios";
        $resultado = ConfigDB::Get()->query($sql);
        return $resultado->fetch_all((MYSQLI_ASSOC));
    }
    public static function ListarShow(){
        $sql="select id,nombre_servicio,descripcion,detalle from servicios";
        $resultado = ConfigDB::Get()->query($sql);
        return $resultado->fetch_all((MYSQLI_ASSOC));
    }



}

?>

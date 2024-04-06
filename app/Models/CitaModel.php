<?php

namespace CitasMedicas\Models;

use CodeIgniter\Model;

class CitaModel extends Model {

    protected $table      = 'citas_medicas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ["id_paciente","id_servicio","fecha_registro","fecha_cita","hora_cita","status_cita","duracion_cita","ciclo_servicio"];

    protected bool $allowEmptyInserts = false;

    public function callProcedure($id){
        $query = $this->db->query("call obtener_cita_id($id);");
        $resultado = $query->getResult("array");
        
        if(empty($resultado)) return null;
        return $resultado[0]; 
    }

    public function CitasDetalle(){
        $this->builder()->select("
        citas_medicas.id as id,
        citas_medicas.fecha_cita as fecha_cita,
        citas_medicas.hora_cita as hora_cita,
        citas_medicas.status_cita as status_cita,
        citas_medicas.fecha_registro as fecha_registro,
        pacientes.nombre as nombre,pacientes.apellido as apellido,
        servicios.nombre_servicio as nombre_servicio")
        ->join("pacientes","pacientes.id=citas_medicas.id_paciente")
        ->join("servicios","servicios.id=citas_medicas.id_servicio");

        return $this;
    }
}

<?php

namespace CitasMedicas\Models;

use CodeIgniter\Model;

class ServicioModel extends Model{

    protected $table      = 'servicios';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ["nombre_servicio","descripcion","detalle","hora_inicio_servicio","hora_fin_servicio","ciclo_citas_dia","ciclos_citas_fin_de_semana","duracion_cita","duracion_cita_lote","fin_de_semana"];

    protected bool $allowEmptyInserts = false;

    public function ListarShow(){
        $this->builder()->select("id,nombre_servicio,descripcion,detalle");
        return $this;
    }

}

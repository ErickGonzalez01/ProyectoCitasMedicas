<?php

namespace CitasMedicas\Models;

use CodeIgniter\Model;

class PacienteModel extends Model {

    protected $table      = 'pacientes';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cedula','nombre','apellido','fecha_nacimiento','telefono'];

    protected bool $allowEmptyInserts = false;
     
}

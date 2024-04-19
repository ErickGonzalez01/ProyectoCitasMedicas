<?php
namespace CitasMedicas\Models;

use CodeIgniter\Model;

use App\ConfigDB;
use mysqli_sql_exception;

class UsuarioModel extends Model{

    protected $table      = 'administracion';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ["correo","clave","nombre","apellido"];

    protected bool $allowEmptyInserts = false;
   
}
?>
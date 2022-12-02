<?php
namespace Model;

use App\ConfigDB;

class Paciente{

    protected static $db;
    
    public $id;
    public $cedula;
    public $nombre;
    public $apellido;
    public $fecha_nacimiento;
    public $telefono;
    public $data;

    function __construct($json){          
        $paciente = json_decode($json,true) ;             
        $this->cedula=$paciente['cedula'];
        $this->nombre=$paciente['nombre'];
        $this->apellido=$paciente['apelldo'];
        $this->fecha_nacimiento=$paciente['fecha_nacimiento'];
        $this->telefono=$paciente['telefono'];        
        $this->data = new ConfigDB();
    }

    public function Crear(){
        $sql="INSERT INTO pacientes(cedula,nombre,apellido,fecha_nacimiento,telefono) VALUE('$this->cedula','$this->nombre','$this->apellido','$this->fecha_nacimiento','$this->telefono')";        
        $resultado = $this->data->Get()->query($sql);
        return json_encode($resultado);
    }
    public  function GetPaciente($id){
        $sql="SELECT * FROM pacientes where id='$id'";
        $resultado = $this->data->Get()->query($sql);
        return json_encode($resultado->fetch_array());
    }
}
?>
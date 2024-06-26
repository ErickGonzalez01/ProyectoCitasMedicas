<?php

namespace Model;

use App\ConfigDB;
use mysqli_sql_exception;

class Paciente
{
    protected static $db;

    public $id;
    public $cedula;
    public $nombre;
    public $apellido;
    public $fecha_nacimiento;
    public $telefono;

    function __construct($paciente)
    {
        $this->cedula = $paciente['cedula'];
        $this->nombre = $paciente['nombre'];
        $this->apellido = $paciente['apellido'];
        $this->fecha_nacimiento = $paciente['fecha_nacimiento'];
        $this->telefono = $paciente['telefono'];
    }

    public function Crear()
    {
        //if ($this->Existe($this->cedula)) {
            $sql = "INSERT INTO pacientes(cedula,nombre,apellido,fecha_nacimiento,telefono) VALUE('$this->cedula','$this->nombre','$this->apellido','$this->fecha_nacimiento','$this->telefono')";
            try {
                $mysqli = ConfigDb::Get();
                $resultado = $mysqli->query($sql);
                $find_id_paciente=$mysqli->insert_id;
                ConfigDb::Close();
                return [$resultado,$find_id_paciente];
            } catch (mysqli_sql_exception $th) {
                return $th->getMessage();
            }
        // }else{
        //     return "Ya existe un registro con el mismo numero de cedula: \"" .$this->cedula."\"";
        // }
    }
    public static  function GetPaciente($id)
    {
        $sql = "SELECT * FROM pacientes where id='$id'";
        try {
            //code...
            $resultado = ConfigDb::Get()->query($sql);
            ConfigDb::Close();
            header("content-type:aplication/json");
            http_response_code(200);
            return \json_encode($resultado->fetch_array(MYSQLI_ASSOC));
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
    public static function GetPacienteId($id): object|null{
        if(!is_numeric($id)){
            return null;
        }
        $sql="SELECT * FROM pacientes WHERE id='$id'";
        $resultado = ConfigDb::Get()->query($sql);
        $objPaciente = $resultado->fetch_object() ?? null;
        return $objPaciente;
    }
    public static  function GetAllPaciente()
    {
        $sql = "SELECT * FROM pacientes";
        try {
            //code...
            $resultado = ConfigDb::Get()->query($sql);
            ConfigDb::Close();
            header("content-type:aplication/json");
            http_response_code(200);
            return \json_encode($resultado->fetch_all(MYSQLI_ASSOC));
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
    public static  function Delete($id)
    {
        $request = json_decode($id, true);

        if ($request["id_usuario"] == "1") {
            $id_usuario = intval($request["id_paciente_delete"]);
            $sql = "DELETE FROM pacientes WHERE id='$id_usuario'";
            try {
                //code...
                $resultado = ConfigDb::Get()->query($sql);
                ConfigDb::Close();
                header("content-type:aplication/json");
                http_response_code(200);
                return \json_encode($resultado);
            } catch (\Throwable $th) {
                return json_encode($th);
            }
        } else {
            header("content-type:aplication/json");
            http_response_code(400);
            return "No tiene autorizacion para eliminar";
        }
    }
    public static function Busqueda($busqueda)
    {
        $busq = json_decode($busqueda, true);

        //$sql="SELECT * FROM pacientes WHERE id like '%".$busq["busqueda"]."%' OR nombre LIKE '%".$busq["busqueda"]."%'"." OR apellido LIKE '%".$busq["busqueda"]."%' OR telefono LIKE '%".$busq["busqueda"]."%'";
        $sql = "SELECT * FROM pacientes WHERE cedula LIKE '%" . $busq["busqueda"] . "%'";
        try {
            //code...
            $resultado = ConfigDb::Get()->query($sql);
            ConfigDb::Close();
            header("content-type:aplication/json");
            http_response_code(200);
            return json_encode($resultado->fetch_array(MYSQLI_ASSOC));
        } catch (\Throwable $th) {
            header("content-type:aplication/json");
            http_response_code(400);
            return json_encode($th);
        }
    }
    private static function Existe($cedula)
    {
        $sql = "select * from pacientes where cedula='$cedula'";
        $resultado = ConfigDb::Get()->query($sql);
        $estado = $resultado->fetch_object();

        if (is_null($estado)) {
            return true;
        } else {
            return false;
        }
    }
    public static function lista_paciente(){
        $sql="SELECT * FROM pacientes ORDER BY id ASC";
        try{
            $resultado=ConfigDb::Get()->query($sql);
        }
        catch(mysqli_sql_exception $ex){
            return $ex;
        }        
        return $resultado;
    }
}

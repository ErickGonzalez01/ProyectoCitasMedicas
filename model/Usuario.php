<?php
    namespace Model;
    use App\ConfigDB;
    use mysqli_sql_exception;
    class Usuario{
        public $correo;
        public $clave;

        public function __construct($json){
            $decode = json_decode($json,true);
            $this->correo=$decode["correo"];
            $this->clave=$decode["clave"];
        }
        public function Login(){
            $sql= "SELECT correo FROM administracion WHERE correo='$this->correo' and clave=MD5('$this->clave')";
            try {
                $resultado=ConfigDB::Get()->query($sql)->fetch_array(MYSQLI_ASSOC);
                ConfigDB::Close();
                if($resultado["correo"]===$this->correo){
                    return true;
                }
                header("content-type:aplicacion/json");
                http_response_code(200);
                return json_encode($resultado);
            } catch (mysqli_sql_exception $th) {
                header("content-type:aplicacion/json");
                http_response_code(200);
                return json_encode($th->getMessage());
            }
        }
    }
?>
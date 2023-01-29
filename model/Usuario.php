<?php
    namespace Model;
    use App\ConfigDB;
use mysqli;
use mysqli_sql_exception;
    class Usuario{
        public $correo;
        public $clave;

        public function __construct($post){
           
            $this->correo=$post["correo"];
            $this->clave=$post["clave"];
        }
        public function UsuarioExiste(){
            $sql= "SELECT * FROM administracion WHERE correo='$this->correo' LIMIT 1";
            try {
                $resultado=ConfigDB::Get()->query($sql);                
                ConfigDB::Close();
                return $resultado;
            } catch (mysqli_sql_exception $th) {
                return $th->getMessage();
            }
        }
        public function Crear(){
            $sql = "INSERT INTO administracion(correo,clave) VALUE('$this->correo','$this->clave')";
            try {
                $resultado= ConfigDB::Get()->query($sql);
                ConfigDB::Close();
                return $resultado;                
            } catch (mysqli_sql_exception $th) {                
                return $th->getMessage();
            }
        }
    }
?>
<?php
    namespace Model;

    use App\ConfigDB;
    use mysqli_sql_exception;

    class Usuario{
        public $id; 
        public $correo;
        public $clave;
        public $nombre;
        public $apellido;

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
            $sql = "INSERT INTO administracion(correo,clave,nombre,apellido) VALUE('$this->correo','$this->clave','$this->nombre','$this->apellido')";
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
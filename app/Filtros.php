<?php
   namespace App;
   
   class Filtros{
    public static function UsuarioAdministrador(){

        if($_SESSION["login"] !== true){
            header("location: /login");
        }
    }
}
?>
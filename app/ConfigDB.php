<?php
namespace App;
use Exception;
use mysqli;

class ConfigDB{
    public static function Get(){          
        try {           
            $mysql = new mysqli("localhost","root","rty$%jhu*HuNh4","citas"); //base de datos de producion
            //$mysql = new mysqli("localhost","root","","citas"); //base de datos de desarrollo
            return $mysql;
        } catch (Exception $th) {
            return $th;
        }       
    }
    public static function Close(){                 
        self::Get()->Close();      
    }
}
    
?>
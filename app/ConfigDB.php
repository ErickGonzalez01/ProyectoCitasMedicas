<?php
namespace App;
use Exception;
use mysqli;

class ConfigDB{
    public static function Get(){          
        try {           
            $mysql = new mysqli("localhost","root","rty$%jhu*HuNh4","citas");
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
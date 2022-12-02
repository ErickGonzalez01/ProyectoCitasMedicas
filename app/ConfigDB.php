<?php
namespace App;
use Exception;
use mysqli;
  function ConectarBD():mysqli{       
        try {           
            $mysql = new mysqli("localhost","root","","citas");
        } catch (Exception $th) {
            echo $th;
        }        
        return $mysql;
    } 
?>
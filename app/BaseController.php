<?php
namespace App;

use App\Validation;
use MVC\Router;

class BaseController{
    public function View(string $view, array $data=null){
        include_once __DIR__."../../view/".$view.".php";

    }
    public function Render($view, $datos=[]){
        //$usuario=$_SESSION["usuario"] ?? "";

        foreach($datos as $key => $value){
            $$key=$value;
        }
        ob_start();
        include_once __DIR__."../../view/".$view.".php";

        $contenido= ob_get_clean();

       return include_once __DIR__."../../view/main.php";
    }
}
<?php
namespace MVC;
class Router{

    public $rutasGET=[];
    public $rutasPOST=[];

    public function Get($url, $fn){
        $this->rutasGET[$url]= $fn;
    }

    public function ComprobarRutas(){
        $urlActual =$_SERVER['PATH_INFO']?? "/";
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo==='GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }

        if($fn){
            // La url existe y hay una funcion asociada 
            //echo $this;
            call_user_func($fn, $this);
            
        }else{
            echo "<h1>404</h1>";
            echo "<p>Pagina no encontrada</P>";
        }
    }
}

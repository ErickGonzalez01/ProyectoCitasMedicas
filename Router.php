<?php
namespace MVC;
class Router{
    public $rutasGET=[];
    public $rutasPOST=[];
    public function Get($url, $fn){        
        $this->rutasGET[$url]= $fn;
    }
    public function Post($url, $fn){
        $this->rutasPOST[$url]=$fn;
    }
    public function ComprobarRutas(){
        $urlActual =$_SERVER['PATH_INFO']?? "/";
        $metodo = $_SERVER['REQUEST_METHOD'];
        if($metodo==='GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
            if($fn){
                // La url existe y hay una funcion asociada            
                call_user_func($fn, $this);            
            }else{
                echo "<h1>404</h1>";
                echo "<p>Pagina no encontrada</P>";
            }
        }
        if($metodo==='POST'){
            $fn = $this->rutasPOST[$urlActual] ?? null;
            if($fn){
                // La url existe y hay una funcion asociada            
                call_user_func($fn, $this);            
                //echo "POST";
            }else{
                echo "<h1>404</h1>";
                echo "<p>Pagina no encontrada</P>";
            }
        }
        
    }
    public function Render($view){
        ob_start();
        include __DIR__."/view/$view.php";

        $contenido= ob_get_clean();

        include __DIR__."/view/calendario.php";

    }
    public function RenderAPI($response){
        echo $response;
    }
}

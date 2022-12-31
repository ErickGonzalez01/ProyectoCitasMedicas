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
        session_start();
        $aut=$_SESSION["login"] ?? null;
        //debuguear($_SESSION);
        //var_dump($_SESSION);
        $rutas_protegidas=["/","/traveler","/paciente"
        ];

        $urlActual =$_SERVER['PATH_INFO']?? "/";
        $metodo = $_SERVER['REQUEST_METHOD'];

        

        if($metodo==='GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }
        if($metodo==='POST'){
            $fn = $this->rutasPOST[$urlActual] ?? null;
        } 
        if(in_array($urlActual,$rutas_protegidas) && !$aut){
            header("location: /login");
        }
        if($fn){          
            call_user_func($fn, $this);            
        }else{
            echo "<h1>404</h1>";
            echo "<p>Pagina no encontrada</P>";
        } 
    }
    public function Render($view, $datos=[]){
        $usuario=$_SESSION["usuario"] ?? "";

        foreach($datos as $key => $value){
            $$key=$value;
        }
        ob_start();
        include __DIR__."/view/$view.php";

        $contenido= ob_get_clean();

        include __DIR__."/view/main.php";

    }
    public function RenderAPI($response){
        echo $response;
    }
    public function RenderElement($element,$datos=[]){
        foreach($datos as $key => $value){
            $$key=$value;
        }
        ob_start();
        include __DIR__."/view/$element.php";
    }
    public function RenderPague($view, $datos=[]){
        foreach($datos as $key => $value){
            $$key=$value;
        }
        include __DIR__."/view/$view.php";
    }
}

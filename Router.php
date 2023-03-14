<?php
namespace MVC;
class Router{
    public $rutasGET=[];
    public $rutasPOST=[];
    public function Get($url, $fn,$collback=null){        
        $this->rutasGET[$url]= [$fn,$collback];
    }
    public function Post($url, $fn, $collback=null){
        $this->rutasPOST[$url]=[$fn,$collback];
    }
    public function ComprobarRutas(){        
        session_start();                    
        $aut=$_SESSION["login"] ?? null;
        
        $rutas_protegidas=["/","/traveler","/paciente","/listarcitas","/servicios"];

        $urlActual =$_SERVER['PATH_INFO']?? "/";
        $metodo = $_SERVER['REQUEST_METHOD'];
        $filtro=null;        

        if($metodo==='GET'){
            $fn = $this->rutasGET[$urlActual][0] ?? null;
            $filtro=$this->rutasGET[$urlActual][1];
        }
        if($metodo==='POST'){
            $fn = $this->rutasPOST[$urlActual][0] ?? null;
            $filtro= $this->rutasPOST[$urlActual][1];
        } 
        // if(in_array($urlActual,$rutas_protegidas) && $aut !== true){
        //     header("location: /login");
        // }
        if($fn){      
            if($filtro !== null){
                call_user_func($filtro); 
                call_user_func($fn, $this);
            }
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
    public function RenderAPI(string $json){
        header("content-type:application/json");
        echo $json;
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

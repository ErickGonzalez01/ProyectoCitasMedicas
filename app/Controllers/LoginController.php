<?php
namespace CitasMedicas\Controllers;

use CitasMedicas\Models\UsuarioModel;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use MVC\Router;
use Model\Usuario;

class LoginController extends BaseController{

    private $model;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
    parent::initController($request, $response, $logger);
    $this->model = new UsuarioModel();
    
    }

    public static function LogAut(){
        //session_start();
        session_destroy();
        //$_SESSION=[];
        //debuguear($_SESSION);
        header("location: /login");
    }
    public static function Start(Router $router){
        $router->RenderPague("login/login");
    }
    public static function Registrate(Router $router){
        $router->RenderPague("login/registrate");
    }
    public static function NuevoUsuario(Router $router){
        $correo=$_POST["correo"];
        $clave1=$_POST["clave1"];
        $clave2=$_POST["clave2"];
        $clave="";
        $errores=[];
        $hast="";

        //correo
        if(empty($correo)){            
            $errores[]="El correo no puede estar vacio.";
        }
        //claves iguales
        if($clave1===$clave2){
            $clave=$clave1;                
        }else{
            $errores[]="Las claves no son iguales.";
        }
        //longitud
        if(strlen($clave)>=8){
            $hast=password_hash($clave,PASSWORD_BCRYPT);                        
        }else{
            $errores[]="La clave debe contener almenos 8 caracteres.";
        }
        if(empty($errores)){
            $usuario = new Usuario(["correo"=>$correo,"clave"=>$hast]);
            $estado=$usuario->Crear();
            if($estado===true){
                header("location: /login");
            }else{
                $errores[]=$estado;
                $router->RenderPague("login/registrate",$errores);
            }
        }else{
            $router->RenderPague("login/registrate",["errores"=>$errores]);
        }
    }
    public function LogIn(){//ok
        $correo= $this->request->getVar("correo");
        $clave = $this->request->getVar("clave");

        $validacion = $this->validate([
            "correo"=>"required|valid_email",
            "clave"=>"required"
        ]);

        if(!$validacion){
            return view("login/login",["errores"=>$this->validator->getErrors(),"post"=>["correo"=>$correo,"clave"=>$clave]]);
        }

        $usuario = $this->model->where("correo",$correo)->first();

        if(!$usuario || !password_verify($clave, $usuario["clave"])){
            return view("login/login",["errores"=>["Correo o contraseña incorrectos."],"post"=>["correo"=>$correo,"clave"=>$clave]]);
        }
        
        $session = session();

        $session->set($usuario);

        return $this->response->redirect("/");
    }
}
?>

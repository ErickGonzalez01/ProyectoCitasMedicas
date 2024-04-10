<?php
namespace CitasMedicas\Controllers;

use CitasMedicas\Models\UsuarioModel;
use CitasMedicas\Models\RollUsuarioModel;
use CitasMedicas\Models\RollModel;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class LoginController extends BaseController{

    private $model;

    protected $helpers = ["usuario"];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
    parent::initController($request, $response, $logger);
    $this->model = new UsuarioModel();
    
    }

    public function LogAut(){//ok
        $sesion = session();
        $sesion->destroy();
        return $this->response->redirect("/authentication/login");
    }
    public function Index(){
        return view("login/login");
    }

    public function Registrate(){
        $views = view("login/registrate",[
            "menu" => true,
            "usuario" => true,
            "user_active" => "active"
        ]);
        return \view("main",["contenido" => $views, "usuario" => \getFullName()]);
    }

    public function NuevoUsuario(){

        $arrayDataPost = [
            "nombre"    => $this->request->getVar("nombre"),
            "apellido"  => $this->request->getVar("apellido"),
            "correo"    => $this->request->getVar("correo"),
            "clave"    => \password_hash($this->request->getVar("clave1"), \PASSWORD_BCRYPT)
        ];

        $validacion = $this->validate([
            "nombre"    => "required|string|max_length[50]",
            "apellido"  => "required|string|max_length[50]",
            "correo"    => "required|valid_email|is_unique[administracion.correo]",
            "clave1"    => "required|alpha_numeric_punct|min_length[8]|max_length[12]",
            "clave2"    => "required|alpha_numeric_punct|min_length[8]|max_length[12]|matches[clave1]"
        ]);

        if(!$validacion){
            $views = view("login/registrate",[
                "errores"=>$this->validator->getErrors(),
                "post"=>$arrayDataPost,
                "menu" => true,
                "usuario" => true,
                "user_active" => "active"
            ]);
            return \view("main",["contenido" => $views, "usuario" => \getFullName()]);
        }

        $this->model->insert($arrayDataPost);

        $vista = view("login/registrate",[
            "creado"=>"Usuario creado correctamente.",
            "menu" => true,
            "usuario" => true,
            "user_active" => "active"
        ]);
        return \view("main",["contenido" => $vista, "usuario" => \getFullName()]);

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
        
        $arrayDataSession = [
            "id"        => $usuario["id"],
            "nombre"    => $usuario["nombre"],
            "apellido"  => $usuario["apellido"],
            "correo"    => $usuario["correo"]
        ];

        $rollUsuarioModel = new RollUsuarioModel();

        $roll = $rollUsuarioModel->getRollUsuario($usuario["id"]);

        $rolles = \array_map(function($roll){
            return $roll["roll"];
        },$roll);

        $rollModel = new RollModel();
        $resles_generales = $rollModel->findColumn("nombre");

        $session = session();

        $session->set(["usuario" => $arrayDataSession]);

        $session->set(["rolles" => $rolles]);

        $session->set(["rolles_generales" => $resles_generales]);

        return $this->response->redirect("/");
    }
}
?>

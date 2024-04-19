<?php

namespace CitasMedicas\Controllers;

use CitasMedicas\Models\UsuarioModel;
use CitasMedicas\Models\RollUsuarioModel;
use CitasMedicas\Models\RollModel;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use CodeIgniter\View\Table;

class LoginController extends BaseController {

    private $model;

    protected $helpers = ["usuario"];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
        parent::initController($request, $response, $logger);
        $this->model = new UsuarioModel();
    }

    public function RemoveRoll(){
         
        $data = [
            "correo" => $this->request->getVar("correo"),
            "roll" => $this->request->getVar("roll")
        ];

        $usuario = $this->model->select("id")->where("correo", $data["correo"])->first();
        $idUsuario = $usuario["id"];

        $rollUsuarioModel = new RollUsuarioModel();

        $status = $rollUsuarioModel->where("id_usuario", $idUsuario)->where("id_roll", $data["roll"])->delete();

        return $this->response->setJSON(["mensaje" => "Rol eliminado correctamente.","post"=>$data, "status"=>$status]);
    }

    public function AddRoll(){
        $correo = $this->request->getVar("correo");
        $roll = $this->request->getVar("roll");

        $usuario = $this->model->select("id")->where("correo", $correo)->first();
        $idUsuario = $usuario["id"];

        $rollUsuarioModel = new RollUsuarioModel();
        $status = $rollUsuarioModel->insert(["id_usuario" => $idUsuario, "id_roll" => $roll]);
        
        if(!$status){
            return $this->response->setJSON(["mensaje" => "Ocurrio un error."]);
        }

        return $this->response->setJSON(["mensaje" => "Rol asignado correctamente."]);
    }

    public function LogAut() { //ok
        $sesion = session();
        $sesion->destroy();
        return $this->response->redirect("/authentication/login");
    }
    public function Index() {
        return view("login/login");
    }

    public function Registrate() {
        $views = view("login/registrate", [
            "menu" => true,
            "usuario" => true,
            "user_active" => "active"
        ]);
        return \view("main", ["contenido" => $views, "usuario" => \getFullName()]);
    }

    public function NuevoUsuario() {

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

        if (!$validacion) {
            $views = view("login/registrate", [
                "errores" => $this->validator->getErrors(),
                "post" => $arrayDataPost,
                "menu" => true,
                "usuario" => true,
                "user_active" => "active"
            ]);
            return \view("main", ["contenido" => $views, "usuario" => \getFullName()]);
        }

        $this->model->insert($arrayDataPost);

        $vista = view("login/registrate", [
            "creado" => "Usuario creado correctamente.",
            "menu" => true,
            "usuario" => true,
            "user_active" => "active"
        ]);
        return \view("main", ["contenido" => $vista, "usuario" => \getFullName()]);
    }
    public function LogIn() { //ok
        $correo = $this->request->getVar("correo");
        $clave = $this->request->getVar("clave");

        $validacion = $this->validate([
            "correo" => "required|valid_email",
            "clave" => "required"
        ]);

        if (!$validacion) {
            return view("login/login", ["errores" => $this->validator->getErrors(), "post" => ["correo" => $correo, "clave" => $clave]]);
        }

        $usuario = $this->model->where("correo", $correo)->first();

        if (!$usuario || !password_verify($clave, $usuario["clave"])) {
            return view("login/login", ["errores" => ["Correo o contraseña incorrectos."], "post" => ["correo" => $correo, "clave" => $clave]]);
        }

        $arrayDataSession = [
            "id"        => $usuario["id"],
            "nombre"    => $usuario["nombre"],
            "apellido"  => $usuario["apellido"],
            "correo"    => $usuario["correo"]
        ];

        $rollUsuarioModel = new RollUsuarioModel();

        $roll = $rollUsuarioModel->getRollUsuario($usuario["id"]);

        $rolles = \array_map(function ($roll) {
            return $roll["roll"];
        }, $roll);

        $rollModel = new RollModel();
        $resles_generales = $rollModel->findColumn("nombre");

        $session = session();

        $session->set(["usuario" => $arrayDataSession]);

        $session->set(["rolles" => $rolles]);

        $session->set(["rolles_generales" => $resles_generales]);

        return $this->response->redirect("/");
    }

    public function FindAll() {

        $rollUsuarioModel = new RollUsuarioModel();

        $rollNameUserId = $rollUsuarioModel->select("roll_usuario.id_usuario, roll.nombre as roll")
            ->join("roll", "roll.id = roll_usuario.id_roll")
            ->findAll();

        $usuarios = $this->model->findAll();

        foreach ($usuarios as $key => $usuario) {

            $userRolles =\array_filter($rollNameUserId, function ($roll) use ($usuario) {

                return $roll["id_usuario"] == $usuario["id"];
            });

            $roll = \array_map(function ($roll) {

                return $roll["roll"];

            }, $userRolles);

            $rollStrinLine = \implode(";", $roll);

            $usuarios[$key]["rolles"] = $rollStrinLine;
        }

        
        $view = view("pagues/usuarios", [
            "usuarios" => $usuarios,
            "menu" => true,
            "usuario" => true,
            "usuarios_active" => "active"
        ]);
        return \view("main", ["contenido" => $view, "usuario" => \getFullName()]);
    }

    public function FindRoll(){

        $roles = new RollModel();
        $roles = $roles->findAll();

        $view = view("pagues/roll", [
            "roles" => $roles, 
            "roll_active" => "active",
            "menu" => true,
            "usuario" => true
        ]);

        return \view("main", ["contenido" => $view, "usuario" => \getFullName()]);

    }

    public function GetAddRoll(){
        $arrayUsuarios = $this->model->findAll();

        $table = new Table();

        $table->setHeading("Nombre", "Apellido", "Correo");
        $table->setTemplate([
            "table_open" => "<table id='table_usuario' class='table table-hover'>"
        ]);

        $arrayUsuariosSim = \array_map(function ($usuario) {
            return [
                $usuario["nombre"],
                $usuario["apellido"],
                $usuario["correo"]
            ];
        }, $arrayUsuarios);

        $tableHtml = $table->generate($arrayUsuariosSim);

        $view = \view("pagues/addRoll", [
            "tabla_usuarios" => $tableHtml,
            "menu" => true,
            "usuario" => true,
            "asignar_roles" => "active"
        ]);

        return \view("main", ["contenido" => $view, "usuario" => \getFullName()]);
    }

    public function GetRollOfUser() {
        $correo = $this->request->getGet("correo");
        $rollUsuarioModel = new RollUsuarioModel();

        $rollNameUserId = $rollUsuarioModel->select("roll.nombre as roll")
            ->join("roll", "roll.id = roll_usuario.id_roll")
            ->join("administracion", "administracion.id = roll_usuario.id_usuario")
            ->where("administracion.correo", $correo)
            ->findAll();

        return $this->response->setJSON($rollNameUserId);
    }

    public function PostAddRollToUser() {
        $id_usuario = $this->request->getVar("id_usuario");
        $id_roll = $this->request->getVar("id_roll");

        $rollUsuarioModel = new RollUsuarioModel();

        $rollUsuarioModel->insert(["id_usuario" => $id_usuario, "id_roll" => $id_roll]);

        return $this->response->setJSON(["mensaje" => "Roll asignado correctamente."]);
    }

    public function GetRoles() {
        $rollModel = new RollModel();
        $resles_generales = $rollModel->findAll();

        return $this->response->setJSON($resles_generales);
    }
}

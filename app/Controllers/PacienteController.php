<?php
namespace CitasMedicas\Controllers;

use CodeIgniter\API\ResponseTrait;
use CitasMedicas\Models\PacienteModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use stdClass;

class PacienteController extends BaseController {

    use ResponseTrait;
    private $model;
    protected $helpers = ["usuario"];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
        parent::initController($request, $response, $logger);
        $this->model = new PacienteModel();
        
    }

    public function Get(){

        $view = view("pagues/paciente",["sider"=>["paciente"=>"active"]]);

        return view("main",["contenido"=>$view, "usuario"=>getFullName()]);
    }

    public function Crear(){//ok

        $data = [
            "cedula" => $this->request->getVar("cedula"),
            "nombre" => $this->request->getVar("nombre"),
            "apellido" => $this->request->getVar("apellido"),
            "fecha_nacimiento" => $this->request->getVar("fecha_nacimiento"),
            "telefono" => $this->request->getVar("telefono")
        ];

        $boolValidation = $this->validate([
            "cedula"            => "required|exact_length[16]|is_unique[pacientes.cedula]",
            "nombre"            => "required|string",
            "apellido"          => "required|string",
            "fecha_nacimiento"  => "required",
            "telefono"          => "required|exact_length[8]"
        ]);

        if(!$boolValidation){
            $errores = $this->validator->getErrors();
            $view = view("pagues/paciente",["errores"=>$errores,"post"=>$data,"estado"=>false,"sider"=>["paciente"=>"active"]]);
            return view("main",["contenido"=>$view, "usuario"=>getFullName()]);    
        }

        $id = $this->model->insert($data);

        $paciente = (object) $data;
        $paciente->id = $id;

        $views = view("pagues/paciente",[
            "estado"=>true,
            "sider"=>[
                "paciente"=>"active"
            ],
            "errores"=>[
                "Se guardo correctamente."
            ],
            "paciente"=>$paciente
            ]);

        return view("main",["contenido"=>$views, "usuario"=>getFullName()]); 
      
    }

    public function GetPaciente(){
        $intIdPaciente = $this->request->getVar("id");
        $pacienteId = $this->model->find($intIdPaciente);
        return $this->respond($pacienteId);
    }
    public function GetAllPaciente(){
        $resultado = $this->model->findAll();
        return $this->respond($resultado);
    }
    public static function Delete(Router $router){   
        $resultado = Paciente::Delete(file_get_contents("php://input"));
        $router->renderAPI($resultado);
    }
    public function Busqueda(){ //ok

        $jsonCedulaPost = $this->request->getJsonVar("busqueda");

        $resultado = $this->model->where("cedula",$jsonCedulaPost)->first();

        return $this->respond($resultado);
    }
    public function lista_pacientes(){//ok 

        $lista_pacientes = $this->model->findAll();
        
        $objetoArray= array_map(function($item){return (object) $item;} ,$lista_pacientes);

        $datos=[
            "sider"=>["lista_de_pacientes"=>"active"],
            "lista_de_pacientes"=>$objetoArray
        ];
        $view = \view("pagues/listar_paciente",$datos);
        return view("main",["contenido"=>$view, "usuario"=>getFullName()]);
    }

}
?>
<?php
namespace CitasMedicas\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;
use CitasMedicas\Models\CitaModel;
use CitasMedicas\Models\PacienteModel;
use CitasMedicas\Models\ServicioModel;
use CitasMedicas\Citas\GenerarCita;

class TravelerController extends BaseController{

    use ResponseTrait;

    protected $helpers = ["usuario"];

    private $servicioModel;
    private $pacienteModel;
    private $citaModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
        parent::initController($request, $response, $logger);

        $this->servicioModel = new ServicioModel();
        $this->pacienteModel = new PacienteModel();
        $this->citaModel = new CitaModel();
    }

    public function CitaCreada(){//ok
        $id = $this->request->getGet("id");
        $datos1 = $this->citaModel->callProcedure($id);

        if(is_null($datos1)){
            return $this->response->redirect("/");
        }

        $datos=["cita"=> $datos1];

        return view("info/confirmar_cita",$datos);
    }

    public function Get(){//ok

        $servicios = $this->servicioModel->findAll();

        $views = view("pagues/traveler", [
            "sider"=>["cita"=>"active"],
            "servicios"=>$servicios
        ]);

        return view("main",["contenido"=>$views, "usuario"=>getFullName()]);
    }

    public function GetIdPaciente(){//ok

        $intIdPaciente = $this->request->getGet("id");

        $servicios = $this->servicioModel->findAll();

        $paciente = (object)$this->pacienteModel->find($intIdPaciente);


        if($paciente == null){
            return $this->response->redirect("/traveler");
        }

        $views = view("pagues/traveler", [
            "sider"=>["cita"=>"active"],
            "servicios"=>$servicios,
            "paciente"=>$paciente
        ]);

        return view("main",["contenido"=>$views, "usuario"=>getFullName()]);
        
    }

    public function Crear(){//ok

        $paciente_id = $this->request->getVar("paciente_id"); 
        $id_servicio = $this->request->getVar("id_servicio");
        $fecha_cita = $this->request->getVar("fecha_cita");

        $boolValidacion = $this->validate([
            "paciente_id" => "required|integer|is_not_unique[pacientes.id]",
            "id_servicio" => "required|integer|is_not_unique[servicios.id]",
            "fecha_cita" => "required|valid_date[Y-m-d]"
        ]);

        $objPaciente = (object) $this->pacienteModel->first($paciente_id);

        if(!$boolValidacion){             

            $vista = view("pagues/traveler",[
                "sider"=>["cita"=>"active"],
                "paciente"=>$objPaciente,
                "status"=> false,
                "errores"=> ["Campos no validos."],
                "servicios"=> $this->servicioModel->findAll(),
                "form"=>$_POST
            ]);

            return view("main",["contenido"=>$vista,"usuario"=>getFullName()]);
        }
        
        $db_citas = $this->citaModel->where("fecha_cita",$fecha_cita)->where("id_servicio", $id_servicio)->findAll();

        $db_servicio = (object)$this->servicioModel->find($id_servicio);

        $generarCita = new GenerarCita($fecha_cita, $db_citas, $db_servicio);

        $cita = $generarCita->GetCita();

        if($cita == null){
            $vista = view("pagues/traveler",[
                "sider"=>["cita"=>"active"],
                "paciente"=>$objPaciente,
                "status"=> false,
                "errores"=> ["No hay cita disponible."],
                "servicios"=> $this->servicioModel->findAll(),
                "form"=>$_POST
            ]);

            return view("main",["contenido"=>$vista,"usuario"=>getFullName()]);
        }

        $data=[
            "id_paciente" => $paciente_id,
            "id_servicio" => $id_servicio,
            "fecha_registro" => Time::now(),
            "fecha_cita" => $fecha_cita,
            "hora_cita" => $cita,
            "status_cita" => "Activa",
            "duracion_cita" => $db_servicio->duracion_cita,
            "citas_lote" => false,
            "ciclo_servicio" => $generarCita->GetCiclo()
        ];

        $id = $this->citaModel->insert($data);

        $vista = view("pagues/traveler",[
            "sider"=>["cita"=>"active"],
            //"paciente"=>$objPaciente,
            "status"=> true,
            "errores"=> ["Se creo con exito la cita."],
            "servicios"=> $this->servicioModel->findAll(),
            "info"=>$id
        ]);

        return view("main",["contenido"=>$vista,"usuario"=>getFullName()]);
             
    }
}
<?php

namespace CitasMedicas\Controllers;

use CitasMedicas\Models\CitaModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use CitasMedicas\Models\ServicioModel;

class CitaController extends BaseController
{

    use ResponseTrait;
    private $model;
    protected $helpers = ["usuario"];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->model = new CitaModel();
    }

    public function Listar()
    {
        //$router->RenderAPI(Cita::Listar($status=false));
        $resultado = $this->model->where("status_cita", "Activa")->find();
        return $this->respond($resultado);
    }

    public function Listar_Citas_Star()
    { //ok
        $servicio = new ServicioModel();
        $lista_de_citas = $this->model->CitasDetalle()->findAll();
        $lista_servicios = $servicio->findAll();
        $data = [
            "servicios" => $lista_servicios,
            "citas" => $lista_de_citas,
            "sider" => [
                "citas_programadas" => "active"
            ]
        ];

        $views = view("pagues/listar_citas", $data);
        return view("main", ["contenido" => $views, "usuario" => getFullName()]);

        //return $router->Render("pagues/listar_citas",$data);
    }
    public function Filtro(){

        $date = $this->request->getVar("date") ?? "";
        $servicio = $this->request->getVar("servicio") ?? "";
        $busqueda = $this->request->getVar("busqueda") ?? "";

        $query = $this->model->CitasDetalle();

        if (!empty($date)) {
            $query = $query->where("citas_medicas.fecha_cita", $date);
        }

        if (!empty($servicio)) {
            $query = $query->where("citas_medicas.id_servicio", $servicio);
        }

        if (!empty($busqueda)) {
            $query = $query
            ->like("pacientes.nombre", $busqueda)
            ->like("pacientes.apellido", $busqueda);
        }

        $resultado = $query->findAll();

        return $this->respond($resultado);
    }
}

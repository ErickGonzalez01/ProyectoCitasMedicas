<?php

namespace CitasMedicas\Controllers;

use CitasMedicas\Models\ServicioModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class ServicioController extends BaseController {

    protected $helpers = ["usuario"];
    private $model;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
        parent::initController($request, $response, $logger);
        $this->model = new ServicioModel();
    }

    public function listaServicio() { //ok
        
        $servicios = $this->model->ListarShow()->findAll();

        $serviciosObject = \array_map(function($servicio){
            return (object)$servicio;
        },$servicios);

        $data = [
            "lista_servicio" => $serviciosObject,
            "sider" => ["listar_servicio" => "active"],
            "menu" => true,
            "servicioMenu" => true
        ];
        $view = view("servicio/servicio_lista", $data);
        return view("main", ["contenido" => $view, "usuario" => getFullName()]);
    }

    public function nuevoServicio(){
        $data = [
            "sider" => ["nuevo_servicio" => "active"],
            "menu" => true,
            "servicioMenu" => true
        ];

        $view = view("servicio/servicio_nuevo", $data);

        return view("main", ["contenido" => $view, "usuario" => getFullName()]);

    }

    public function Guardar(){

        $data = [
            "nombre_servicio" => $this->request->getVar("nombre_servicio"),
            "descripcion" => $this->request->getVar("descripcion"),
            "detalle" => $this->request->getVar("detalle"),
            "hora_inicio_servicio" => $this->request->getVar("hora_inicio_servicio"),
            "hora_fin_servicio" => $this->request->getVar("hora_fin_servicio"),
            "ciclo_citas_dia" => $this->request->getVar("ciclo_citas_dia"),
            "ciclos_citas_fin_de_semana" => $this->request->getVar("ciclos_citas_fin_de_semana"),
            "duracion_cita" => $this->request->getVar("duracion_cita"),
            "duracion_cita_lote" => $this->request->getVar("duracion_cita_lote"),
            "fin_de_semana" => $this->request->getVar("fin_de_semana")
        ];

        $boolValidacion = $this->validate([
            "nombre_servicio" => "required|max_length[45]",
            "descripcion" => "required|max_length[255]",
            "detalle" => "permit_empty|max_length[120]",
            "hora_inicio_servicio" => "required",
            "hora_fin_servicio" => "required",
            "ciclo_citas_dia" => "required|is_Numeric|integer",
            "ciclos_citas_fin_de_semana" => "required|is_Numeric|integer",
            "duracion_cita" => "required|is_Numeric|integer",
            "duracion_cita_lote" => "required|is_Numeric|integer",
            "fin_de_semana" => "required|in_list[true,false]"
        ]);

        if(!$boolValidacion){
            $data = [
                "sider" => ["nuevo_servicio" => "active"],
                "menu" => true,
                "servicioMenu" => true,
                "datos" => $data,
                "error" => $this->validator->getErrors()
            ];

            $view = view("servicio/servicio_nuevo", $data);
            return view("main", ["contenido" => $view, "usuario" => getFullName()]);
        }

        $data["fin_de_semana"] = $data["fin_de_semana"] === "true" ? true : false;

        $this->model->insert($data);

        $view = view("servicio/servicio_nuevo", [
            "sider" => ["nuevo_servicio" => "active"],
            "menu" => true,
            "servicioMenu" => true,
            "done" => "Se guardo con exito el nuevo servicio " . $data["nombre_servicio"]
        ]);

        return view("main", ["contenido" => $view, "usuario" => getFullName()]);
     
    }
}

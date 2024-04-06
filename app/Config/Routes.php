<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

$routes->get("/api/paciente","PacienteController::GetPaciente"); //ok
$routes->get("/api/paciente/listar","PacienteController::GetAllPaciente"); //ok
//[POST]
$routes->post("/api/paciente/crear","PacienteController::Crear");
$routes->post("/api/paciente/delete","PacienteController::Delete");
$routes->post("/api/paciente/busqueda","PacienteController::Busqueda"); //ok

//============================
//=           Heron          =
//============================
$routes->get("/heron","HeronController::Home"); //en des uso
//============================
//=           Cita API       =
//============================
$routes->post("/api/cita/crear","CitaController::Crear");
$routes->get("/api/cita/listar","CitaController::Listar"); //ok

//
$routes->post("/api/usuario","UsuarioController::Usuario");
$routes->get("/",function(){//ok
    $sesion = Session();    
    $contenido = view("pagues/home",["usuario"=>$sesion->nombre." ".$sesion->apellido]);
    return view("main",["contenido"=>$contenido]);
});
$routes->get("/traveler","TravelerController::Get"); //ok
$routes->post("/traveler","TravelerController::Crear"); //oh
$routes->get("/traveler/cita_creada","TravelerController::CitaCreada");//ok 
//$router->Post("/traveler","PaguesController::CreateTraveler");
$routes->get("/paciente","PacienteController::Get"); //ok
$routes->post("/paciente","PacienteController::Crear");//ok

$routes->get("/listarcitas","CitaController::Listar_Citas_Star");//ok
$routes->post("/listarcitas","CitaController::Filtro"); //ok
$routes->post("/api/listarcitas","CitaController::Filtro");
$routes->get("/test","PacienteController::pacienteExiste");
$routes->get("/programarcita","TravelerController::GetIdPaciente");//ok
$routes->get("/listarpacientes","PacienteController::lista_pacientes"); //ok
$routes->get("/servicios","ServicioController::listaServicio"); //ok
$routes->get("/servicionuevo","ServicioController::nuevoServicio");//ok
$routes->post("/servicionuevo","ServicioController::Guardar");//--

$routes->post("/report/pdf/cita","PDFController::CitaMedica"); //ok

/**
 * Autenticacion
 */
$routes->group("authentication",function($routes){

    $routes->get("login", function(){
        return view("login/login"); //ok
    });
    
    $routes->post("login","LoginController::LogIn");//ok
    
    $routes->get("registrate","LoginController::Registrate");
    $routes->post("registrate","LoginController::NuevoUsuario");
    
    $routes->get("cerrar","LoginController::LogAut");
});
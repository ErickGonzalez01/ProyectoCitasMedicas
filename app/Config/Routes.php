<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 /**
 * Autenticacion
 */
$routes->group("authentication",function($routes){

    $routes->get("login", "LoginController::Index"); //ok
    
    $routes->post("login","LoginController::LogIn");//ok
    
});

/**
 * Cerrar sesion
 */
$routes->get("/user/cerrar","LoginController::LogAut");//ok

/**
 * Vista de registro de usuario
 */
$routes->get("/user/registrate","LoginController::Registrate");//ok--

/**
 * Registro de usuario
 */
$routes->post("/user/registrate","LoginController::NuevoUsuario"); //ok--

/**
 * Rutas de la API
 */
$routes->group("api", function($routes){

    /**
     * 
     */
    $routes->get("paciente","PacienteController::GetPaciente"); //ok
    $routes->get("paciente/listar","PacienteController::GetAllPaciente"); //ok
    $routes->post("paciente/busqueda","PacienteController::Busqueda"); //ok
    $routes->get("cita/listar","CitaController::Listar"); //ok
});

/**
 * Rutas de la aplicacion
 */
$routes->get("/","PaguesController::Home"); //ok
$routes->get("/traveler","TravelerController::Get"); //ok
$routes->post("/traveler","TravelerController::Crear"); //oK
$routes->get("/traveler/cita_creada","TravelerController::CitaCreada");//ok 
$routes->get("/paciente","PacienteController::Get"); //ok
$routes->post("/paciente","PacienteController::Crear");//ok
$routes->get("/listarcitas","CitaController::Listar_Citas_Star");//ok
$routes->post("/listarcitas","CitaController::Filtro"); //ok
$routes->get("/programarcita","TravelerController::GetIdPaciente");//ok
$routes->get("/listarpacientes","PacienteController::lista_pacientes"); //ok
$routes->get("/servicios","ServicioController::listaServicio"); //ok
$routes->get("/servicionuevo","ServicioController::nuevoServicio");//ok
$routes->post("/servicionuevo","ServicioController::Guardar");//ok

$routes->post("/report/pdf/cita","PDFController::CitaMedica"); //ok

$routes->get("/user/findall","LoginController::FindAll"); //ok
$routes->get("/user/finroll","LoginController::FindRoll"); //ok
$routes->get("/user/addroll","LoginController::GetAddRoll"); //ok
$routes->get("/user/rollofuser","LoginController::GetRollOfUser"); //ok
$routes->get("/user/roles","LoginController::GetRoles"); //ok

$routes->post("/user/addroll","LoginController::AddRoll"); //ok
$routes->post("/user/removeroll","LoginController::RemoveRoll"); //ok

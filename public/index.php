<?php
    require_once __DIR__."/../vendor/autoload.php";
    use MVC\Router; 
    use Controller\PropiedadController;
    use Controller\CalendarioController;
    use Controller\PacienteController;
use Model\Paciente;

    $router = new Router();    
    $router->Get('/admin',[PropiedadController::class,"Admin"]);
    $router->Get('/admin/home',[PropiedadController::class,"Admin_Home"]);
    $router->Get('/home',[PropiedadController::class,"Home"]);
    $router->Get('/login',[PropiedadController::class,"Login"]);
    $router->Get('/citas',[PropiedadController::class,"citas"]);
    $router->Get('/reportes',[PropiedadController::class,"reportes"]);
    //------------CALENDARIO------------//
    $router->Get('/calendario',[CalendarioController::class,"Calendario"]);
    
    //----------------Paciente----------------//
    //[GET]
    $router->Get("/api/paciente",[PacienteController::class,"GetPaciente"]);
    $router->Get("/api/paciente/listar",[PacienteController::class,"GetAllPaciente"]);
    //[POST]
    $router->Post("/api/paciente/crear",[PacienteController::class,"Crear"]);
    $router->Post("/api/paciente/delete",[PacienteController::class,"Delete"]);  
   $router->Post("/api/paciente/busqueda",[PacienteController::class,"Busqueda"]);
    $router->ComprobarRutas();

?>   

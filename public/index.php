<?php
    require_once __DIR__."/../vendor/autoload.php";
    use MVC\Router; 
    use Controller\PropiedadController;
    use Controller\CalendarioController;
    use Controller\HeronController;
    use Controller\PacienteController;
    use Controller\CitaController;
    use Controller\LoginController;
    use Controller\UsuarioController;
    use Controller\PaguesController;

    $router = new Router();    
    $router->Get('/admin',[PropiedadController::class,"Admin"]);
    $router->Get('/admin/home',[PropiedadController::class,"Admin_Home"]);
    $router->Get('/home',[PropiedadController::class,"Home"]);
    $router->Get('/login',[PropiedadController::class,"Login"]);
    $router->Get('/citas',[PropiedadController::class,"citas"]);
    $router->Get('/reportes',[PropiedadController::class,"reportes"]);
    //------------CALENDARIO------------//
    $router->Get('/calendario',[CalendarioController::class,"Calendario"]);
    
    
    //============================
    //----------------Paciente API----------------//
    //[GET]
    $router->Get("/api/paciente",[PacienteController::class,"GetPaciente"]);
    $router->Get("/api/paciente/listar",[PacienteController::class,"GetAllPaciente"]);
    //[POST]
    $router->Post("/api/paciente/crear",[PacienteController::class,"Crear"]);
    $router->Post("/api/paciente/delete",[PacienteController::class,"Delete"]);  
    $router->Post("/api/paciente/busqueda",[PacienteController::class,"Busqueda"]);
    

    //============================
    //=           Heron          =
    //============================
    $router->Get("/heron/",[HeronController::class,"Home"]);
    //============================
    //=           Cita API       =
    //============================
    $router->Post("/api/cita/crear",[CitaController::class,"Crear"]);
    $router->Get("/api/cita/listar",[CitaController::class,"Listar"]);

    //Login
    $router->Get("/login",[LoginController::class,"Start"]);
    $router->Post("/api/usuario",[UsuarioController::class,"Usuario"]);
    $router->Get("/home",[PaguesController::class,"inicio"]);

    //   FOOTER
    //==============================
    $router->ComprobarRutas();

?>   

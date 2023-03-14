<?php
    require_once __DIR__."/../vendor/autoload.php";

    use Controller\AdminController;
    use MVC\Router; 
    use Controller\PropiedadController;
    use Controller\CalendarioController;
    use Controller\HeronController;
    use Controller\PacienteController;
    use Controller\CitaController;
    use Controller\LoginController;
    use Controller\UsuarioController;
    use Controller\PaguesController;
    use Controller\TravelerController;
    use Controller\ServicioController;
    use Controller\PDFController;
    use Model\Usuario;
    use App\Filtros;

    $router = new Router();    
    
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
    $router->Get("/registrate",[LoginController::class,"Registrate"]);
    $router->Post("/registrate",[LoginController::class,"NuevoUsuario"]);
    $router->Post("/login",[LoginController::class,"LogIn"]);
    $router->Get("/cerrar",[LoginController::class,"LogAut"]);
    //
    $router->Post("/api/usuario",[UsuarioController::class,"Usuario"]);
    $router->Get("/",[PaguesController::class,"Home"],[Filtros::class,"UsuarioAdministrador"]);
    $router->Get("/traveler",[TravelerController::class,"Get"]);
    $router->Get("/traveler/cita_creada",[TravelerController::class,"CitaCreada"]);
    $router->Post("/traveler",[TravelerController::class,"Crear"]);
    //$router->Post("/traveler",[PaguesController::class,"CreateTraveler"]);
    $router->Get("/paciente",[PacienteController::class,"Get"]);
    $router->Post("/paciente",[PacienteController::class,"Crear"]);
 
    $router->Get("/listarcitas",[CitaController::class,"Listar_Citas_Star"]);
    $router->Post("/listarcitas",[CitaController::class,"Filtro"]);
    $router->Post("/api/listarcitas",[CitaController::class,"Filtro"]);
    $router->get("/test",[PacienteController::class,"pacienteExiste"]);
    $router->get("/programarcita",[TravelerController::class,"GetIdPaciente"]);
    $router->get("/listarpacientes",[PacienteController::class,"lista_pacientes"]);
    $router->get("/servicios",[ServicioController::class,"listaServicio"]);
    $router->get("/servicionuevo",[ServicioController::class,"nuevoServicio"]);
    $router->Post("/servicionuevo",[ServicioController::class,"Guardar"]);

    //Reportes pdf
    $router->post("/report/pdf/cita",[PDFController::class,"CitaMedica"]);
    $router->get("/admincontroller",[AdminController::class,"index"]);

    //   FOOTER
    //==============================
    $router->ComprobarRutas();

?>   

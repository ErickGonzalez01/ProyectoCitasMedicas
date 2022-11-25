<?php
    require_once __DIR__."/../vendor/autoload.php";
    use MVC\Router; 
    use Controller\PropiedadController;
    use Controller\CalendarioController;
    $router = new Router();    
    $router->Get('/admin',[PropiedadController::class,"Admin"]);
    $router->Get('/admin/home',[PropiedadController::class,"Admin_Home"]);
    $router->Get('/home',[PropiedadController::class,"Home"]);
    $router->Get('/login',[PropiedadController::class,"Login"]);
    $router->Get('/citas',[PropiedadController::class,"citas"]);
    $router->Get('/reportes',[PropiedadController::class,"reportes"]);
    //------------CALENDARIO------------//
    $router->Get('/calendario',[CalendarioController::class,"Calendario"]);
    $router->ComprobarRutas();
?>   

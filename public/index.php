<?php
    require_once __DIR__."/../vendor/autoload.php";
    use MVC\Router; 
    use Controller\PropiedadController;  

    $router = new Router();

    $router->Get('/admin',[PropiedadController::class,"Index"]);
    $router->Get('/admin/home','funcion_nosotros');
    $router->Get('/home','funcion_contacto');
    $router->Get('/login','funcion_clientes');
    $router->Get('/citas','funcion_servicios');
    $router->Get('/reportes','funcion_catalogo');
    
    


    
    $router->ComprobarRutas();

 ?>   

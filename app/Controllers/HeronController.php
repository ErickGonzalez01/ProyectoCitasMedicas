<?php
namespace CitasMedicas\Controllers;

//use MVC\Router;
 
class HeronController extends BaseController {
    public function Home(){
       // $router->Render("heron/index");
       return view("heron/index");
    }
}

?>
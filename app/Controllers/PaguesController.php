<?php

namespace CitasMedicas\Controllers;

class PaguesController extends BaseController {
    
    protected $helpers = ['usuario'];

    public function Home(){
        $view = \view('pagues/home');
        return \view("main",["contenido"=>$view, "usuario" => \getFullName()]);
    }
}

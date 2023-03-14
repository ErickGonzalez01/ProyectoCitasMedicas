<?php

    namespace Controller;

    use Model\PruevaModel;

    class AdminController{
        public static function index(){
            echo "admin controller";
            $prueva = new PruevaModel();
            
        }
        


    }
?>
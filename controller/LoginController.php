<?php
    namespace Controller;
    use MVC\Router;
    use Model\Usuario;
    class LoginController{
        public static function LogAut(){
            session_start();
            $_SESSION=[];
            //debuguear($_SESSION);
            header("location: /login");
        }
        public static function Start(Router $router){
            $router->RenderPague("login/login");
        }
        public static function Registrate(Router $router){
            $router->RenderPague("login/registrate");
        }
        public static function NuevoUsuario(Router $router){
            $correo=$_POST["correo"];
            $clave1=$_POST["clave1"];
            $clave2=$_POST["clave2"];
            $clave="";
            $errores=[];
            $hast="";

            //correo
            if(empty($correo)){            
                $errores[]="El correo no puede estar vacio.";
            }
            //claves iguales
            if($clave1===$clave2){
                $clave=$clave1;                
            }else{
                $errores[]="Las claves no son iguales.";
            }
            //longitud
            if(strlen($clave)>=8){
                $hast=password_hash($clave,PASSWORD_BCRYPT);                        
            }else{
                $errores[]="La clave debe contener almenos 8 caracteres.";
            }
            if(empty($errores)){
                $usuario = new Usuario(["correo"=>$correo,"clave"=>$hast]);
                $estado=$usuario->Crear();
                if($estado===true){
                    header("location: /login");
                }else{
                    $errores[]=$estado;
                    $router->RenderPague("login/registrate",$errores);
                }
            }else{
                $router->RenderPague("login/registrate",["errores"=>$errores]);
            }
        }
        public static function LogIn(Router $router){
            $errores=[];
            $correo=$_POST["correo"];
            $clave=$_POST["clave"];
            if(empty($correo)){
                $errores[]="Correo electronico esta vacio.";
            }
            if(empty($clave)){
                $errores[]="Contraseña no debe estar vacio.";
            }
            if(empty($errores)){
                $usuario = new Usuario(["correo"=>$correo,"clave"=>$clave]);
                $resultado=$usuario->UsuarioExiste();
                if(!$resultado->num_rows){
                    $errores[]="Usuario no existe";
                }else{
                    $obj = $resultado->fetch_object();
                    $hast_clave = password_verify($clave,$obj->clave);
                    if($hast_clave){
                        session_start();
                        $_SESSION["usuario"]=$correo;
                        $_SESSION["login"]=true;
                        header("location: /");
                    }else{
                        $errores[]="La contraseña no es valida";
                    }
                }

            }
            if(!empty($errores)){
                $router->RenderPague("login/login",["errores"=>$errores,"post"=>$_POST]);
            }
        }
    }
?>

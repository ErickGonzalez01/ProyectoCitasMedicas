<?php

namespace Controller;

use Model\Servicio;
use MVC\Router;
use App\Validacion;
use Exception;
use mysqli_sql_exception;

class ServicioController extends Validacion
{

    public static function listaServicio(Router $route)
    {
        $data = [
            "lista_servicio" => array_map(function ($data) {
                return (object)$data;
            }, Servicio::ListarSHow()),
            "sider" => ["listar_servicio" => "active"],
            "menu" => true,
            "servicioMenu" => true
        ];
        $route->render("servicio/servicio_lista", $data);
    }

    public static function nuevoServicio(Router $router)
    {
        $data = [
            "sider" => ["nuevo_servicio" => "active"],
            "menu" => true,
            "servicioMenu" => true
        ];
        $router->Render("servicio/servicio_nuevo", $data);
    }

    public static function Guardar(Router $router)
    {

        $boolValidacion = self::Validations([
            "nombre_servicio" => "required|max_lenght[45]",
            "descripcion" => "required|max_lenght[255]",
            "detalle" => "max_lenght[120]",
            "hora_inicio_servicio" => "required|timeVal[H:i]",
            "hora_fin_servicio" => "required|timeVal[H:i]",
            "ciclo_citas_dia" => "required|is_Numeric|mayor_que_numeric[0]", //mayor_que_numeric[-1]
            "ciclos_citas_fin_de_semana" => "required|is_Numeric|mayor_que_numeric[0]",
            "duracion_cita" => "required|is_Numeric|mayor_que_numeric[0]",
            "duracion_cita_lote" => "required|is_Numeric|mayor_que_numeric[0]",
            "fin_de_semana" => "required|is_bool"
        ], [
            "nombre_servicio" => [
                "required" => " El campo 'Nombre de servicio' no puede ser vacio",
                "max_lenght" => " El campo 'Nombre de servicio' sobrepasa la longitud permitida"
            ],
            "descripcion" => [
                "required" => " El campo 'Descripcion' no puede ser vacio",
                "max_lenght" => " El campo 'Descripcion' sobrepasa la longitud permitida"
            ],
            "detalle" => [
                "max_lenght" => " El campo 'Detalle' sobrepasa la longitud permitida"
            ],
            "hora_inicio_servicio" => [
                "required" => " El campo 'Hora de inicio' no puede ser vacio",
                "timeVal" => " El campo 'Hora de inicio' no es una hora valida"
            ],
            "hora_fin_servicio" => [
                "required" => " El campo 'Hora que finaliza el servicio' no puede ser vacio",
                "timeVal" => " El campo 'Hora que finaliza el servicio' no es una hora valida"
            ],
            "ciclo_citas_dia" => [
                "required" => " El campo 'Ciclo del servicio' no puede estar vacio",
                "is_Numeric" => " El campo 'Ciclo del servicio' no es un numero valido",
                "mayor_que_numeric" => " El campo 'Ciclo del servicio' debe ser un numero positivo mayor o igual a 0"
            ],
            "ciclos_citas_fin_de_semana" => [
                "required" => " El campo 'Ciclo del servicio en fin de semana' no puede ser vacio",
                "is_Numeric" => " El campo 'Ciclo del servicio en fin de semana' no es un numero valido",
                "mayor_que_numeric" => " El campo 'Ciclo del servicio' debe ser un numero positivo mayor o igual a 0"
            ],
            "duracion_cita" => [
                "required" => " El campo 'Duracion de las citas' no puede estar vacio",
                "is_Numeric" => " El campo 'Duracion de las citas' no es un numero valido",
                "mayor_que_numeric" => " El campo 'Ciclo del servicio' debe ser un numero positivo mayor o igual a 0"
            ],
            "duracion_cita_lote" => [
                "required" => " El campo 'Duracion citas por lote' no puede estar vacio",
                "is_Numeric" => " El campo 'Duracion citas por lote' no es ub numero valido",
                "mayor_que_numeric" => " El campo 'Ciclo del servicio' debe ser un numero positivo mayor o igual a 0"
            ],
            "fin_de_semana" => [
                "required" => " Debe seleccionar un valor en el campo 'Servicio durante fin de semana' los valores son Si o No",
                "is_bool" => " El campo 'Servicio durante fin de semana' no posee un valor valido"
            ]
        ]);

        if ($boolValidacion === false) {
            $data = [
                "sider" => ["nuevo_servicio" => "active"],
                "menu" => true,
                "servicioMenu" => true,
                "datos" => $_POST,
                "error" => self::getErrorder()
            ];
            return $router->Render("servicio/servicio_nuevo", $data);
            //exit;
        }

        $data = $_POST;
        $objServicio = new Servicio($data);
         $boolServicioNuevo = $objServicio->Guardar();
        if ($boolServicioNuevo === false) {
            $data = [
                "sider" => ["nuevo_servicio" => "active"],
                "menu" => true,
                "servicioMenu" => true,
                "datos" => $_POST,
                "error" => ["Server "=>"Ocurrio un erro inesperado"]
            ];
            return $router->Render("servicio/servicio_nuevo", $data);
            //exit;
        }
        if($boolServicioNuevo===true){
            $data = [
                "sider" => ["nuevo_servicio" => "active"],
                "menu" => true,
                "servicioMenu" => true,
                "done" => "Se guardo con exito el nuevo servicio " . $_POST["nombre_servicio"]
            ];
    
            return $router->Render("servicio/servicio_nuevo", $data);
            //exit;
        }      
    }
}

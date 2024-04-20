<?php

namespace CitasMedicas\Roll;

class RolesOfUsuario
{

    /**
     * Representa todos los roles disponibles en la aplicación.
     * @var array
     */
    private $roles = [];

    /**
     * Representa los roles que tiene el usuario.
     * @var array
     */
    private $rolesUsuario = [];


    private $roles_db = [
        "ADMIN",
        "CREAR_CITA",
        "CREAR_PACIENTE",
        "P_CITAS_PROGRAMADAS",
        "P_CREAR_CITA",
        "P_CREAR_PACIENTE",
        "P_PACIENTE",
        "ROOT"
    ];


    private $rutas = [
        "user/registrate"           =>      ["ROOT"],
        "api/paciente"              =>      ["ROOT", "P_PACIENTE", "CREAR_PACIENTE"],
        "api/paciente/listar"       =>      ["ROOT", "P_PACIENTE"],
        "api/cita/listar"           =>      ["ROOT", "P_CITAS_PROGRAMADAS"],
        "traveler/cita_creada"      =>      ["ROOT", "P_CREAR_CITA"],
        "paciente"                  =>      ["ROOT", "CREAR_PACIENTE", "P_PACIENTE"],
        "listarcitas"               =>      ["ROOT", "P_CITAS_PROGRAMADAS"],
        "programarcita"             =>      ["ROOT", "P_CREAR_CITA","CREAR_CITA"],
        "listarpacientes"           =>      ["ROOT", "P_PACIENTE"],
        "servicios"                 =>      ["ROOT", "ADMIN","ROOT"],
        "api/paciente/busqueda"     =>      ["ROOT", "P_PACIENTE"],
        "traveler"                  =>      ["ROOT", "P_CREAR_CITA","CREAR_CITA"],
        "paciente"                  =>      ["ROOT", "CREAR_PACIENTE","P_PACIENTE"],
        "listarcitas"               =>      ["ROOT", "P_CITAS_PROGRAMADAS"],
        "servicionuevo"             =>      ["ROOT", "ADMIN","ROOT"],
        "report/pdf/cita"           =>      ["ROOT", "P_CITAS_PROGRAMADAS","CREAR_CITA"],
        "user/findall"              =>      ["ROOT", "ADMIN"],
        "user/addroll"              =>      ["ROOT"],
        "user/finroll"              =>      ["ROOT"],
    ];

    function __construct()
    {
        $sesion = session();
        $this->rolesUsuario = $sesion->get("rolles");
        $this->roles = $sesion->get("rolles_generales");
    }

    /**
     * Verifica si el usuario tiene acceso a la ruta.
     * @param string $ruta
     * @return bool
     */
    public function tieneAcceso($ruta){
        if(!isset($this->rutas[$ruta])){
            return true;
        }

        $roles = $this->rutas[$ruta];

        foreach($roles as $rol){
            if(\in_array($rol,$this->rolesUsuario)){
                return true;
            }
        }

        return false;
    }
}

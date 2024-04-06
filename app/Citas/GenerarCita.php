<?php

namespace CitasMedicas\Citas;

use CitasMedicas\Models\CitaModel;
use CitasMedicas\Models\ServicioModel;
use DateTime;
use stdClass;

class GenerarCita{

    private $fecha_cita;

    private $db_citas;
    private $db_servicio;
    private ?int $ciclo_actual;

    /**
     * @param string $fecha_cita
     * @param array $db_citas
     * @param stdClass $db_servicio
     */
    public function __construct(string $fecha_cita, array $db_citas, object $db_servicio){
       
        $this->fecha_cita = $fecha_cita;

        $this->db_citas = $db_citas;
        $this->db_servicio = $db_servicio;
        
    }

    /**
     * Valida si la fecha data es dia de semana, si es fin de semana retorna false
     * @param string fecha
     * @return bool
     */
    private function ValidarSiEsDiaDeSemana(string $fecha):bool{
        $numeroDia = date('N', strtotime($fecha));

        if($numeroDia == "6" || $numeroDia == "7"){
            return false;
        }

        return true;
    }

    /**
     * Devuelve el ciclo dependiento si es dia de semana o fin de semana
     * @return int
     */
    private function DevolverCicloSegun():int{

        if(!$this->ValidarSiEsDiaDeSemana($this->fecha_cita)){
            return $this->db_servicio->ciclos_citas_fin_de_semana;
        }

        return $this->db_servicio->ciclo_citas_dia;
    }

    /**
     * Identifica en que ciclo se encuantra el array de citas
     * @return int
     */
    private function IdentificarCiclo():int{
        if(empty($this->db_citas)){
            return 1;
        }

        $ciclo_actual = 0;

        foreach($this->db_citas as $cita){

            $ciclo_de_la_cita = (int)$cita["ciclo_servicio"];

            if($ciclo_de_la_cita > $ciclo_actual){

                $ciclo_actual = $ciclo_de_la_cita;

            }
        }

        return $ciclo_actual;
    }

    /**
     * Calcula la ultima cita en funcion de la fecha dada
     * @param mixed $ciclo_actual
     * @return string
     */
    private function IdentificarUltimaCita($ciclo_actual):string{

        $citas_ciclo_actual = array_filter($this->db_citas, function($elemento) use($ciclo_actual){

            $ciclo = (int)$elemento["ciclo_servicio"];

            if($ciclo == $ciclo_actual){
                return $elemento;
            }
        });

        $hora_citas = array_map(function($elemento){
            return $elemento["hora_cita"];
        },$citas_ciclo_actual);

        $hora = end($hora_citas); 
        return $hora;
    }

    /**
     * Calcula la hora de la proxima cita en funcion de la ultimacita
     * @param mixed $hora
     * @return string
     */
    private function HoraProximaCita($hora):string{
        if(empty($hora)) return $this->db_servicio->hora_inicio_servicio;

        $proxima_cita = date("H:i:s",strtotime($hora."+".$this->db_servicio->duracion_cita+1 ." minute"));
        return $proxima_cita;
    }

    /**
     * Valida si la cita (hora) esta disponible en funcion de si es fin de semana o si el ciclo esta lleno
     * @param int $ciclo_servico
     * @param int $ciclo_actual
     * @param string $$hora_proxima_cita
     * @return bool
     */
    private function ValitarCitaDisponible(int $ciclo_servico, int $ciclo_actual, string $hora_proxima_cita):bool{
        if($ciclo_servico<$ciclo_actual) return false;

        if(!$this->ValidarSiEsDiaDeSemana($this->fecha_cita)) {
            if($this->db_servicio->fin_de_semana == "0") return false;
        }

        $hora_fin_servicio = $this->fecha_cita . " " . $this->db_servicio->hora_fin_servicio;
        $hora_inicio_cita_actual = $this->fecha_cita ." ". $hora_proxima_cita;

        $hora_fin_cita_actual = $this->fecha_cita ." ". date("H:i:s", strtotime($hora_inicio_cita_actual."+".$this->db_servicio->duracion_cita . " minute"));

        $strToTime_horaFinServicio = strtotime($hora_fin_servicio);
        $strToTime_horaFinCita = strtotime($hora_fin_cita_actual);

        if(strtotime($hora_fin_servicio)<=strtotime($hora_fin_cita_actual)) {
            return false;
        }
        
        return true;
    }

    /**
     * Devuelve la hora de la cita 
     * @return ?string
     */
    public function GetCita():?string{
        $ciclo = $this->DevolverCicloSegun();
        $ciclo_actual = $this->IdentificarCiclo();
        $ultima_cita = $this->IdentificarUltimaCita($ciclo_actual);
        $hora_proxima_cita = $this->HoraProximaCita($ultima_cita);
        $cita_disponible = $this->ValitarCitaDisponible($ciclo, $ciclo_actual, $hora_proxima_cita);

        if($cita_disponible) {
            $this->ciclo_actual = $ciclo_actual; 
            return $hora_proxima_cita;
        }

        if($ciclo_actual+1 <= $ciclo){
            $this->ciclo_actual = $ciclo_actual+1;
            return $this->db_servicio->hora_inicio_servicio;
        }

        return null;
    }

    public function GetCiclo():?int{
        return $this->ciclo_actual;
    }

}
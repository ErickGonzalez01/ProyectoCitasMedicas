<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StoreProcedure extends Migration
{
    public function up()
    {
        //
        $this->db->query('
        CREATE PROCEDURE `obtener_cita_id`(IN id_paciente INT)
        BEGIN
            SELECT p.nombre , p.apellido , c.fecha_cita , c.hora_cita , s.nombre_servicio 
            FROM citas_medicas c
            INNER JOIN pacientes p ON c.id_paciente = p.id
            INNER JOIN servicios s ON c.id_servicio = s.id
            WHERE c.id  = id_paciente ;
        END
        '); // Aqui va el query del store procedure
    }

    public function down()
    {
        //
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Servicios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre_servicio' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
            ],
            'descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
            ],
            'detalle' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'hora_inicio_servicio' => [
                'type' => 'TIME',
            ],
            'hora_fin_servicio' => [
                'type' => 'TIME',
            ],
            'ciclo_citas_dia' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'ciclos_citas_fin_de_semana' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'duracion_cita' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'duracion_cita_lote' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'fin_de_semana' => [
                'type' => 'BIT',
                'constraint' => 1,
                'default' => 0,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('nombre_servicio');
        $this->forge->createTable('servicios');
    }

    public function down()
    {
        $this->forge->dropTable('servicios');
    }
}

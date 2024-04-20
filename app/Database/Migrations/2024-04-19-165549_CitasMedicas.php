<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CitasMedicas extends Migration
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
            'id_paciente' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_servicio' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'fecha_registro' => [
                'type' => 'DATE',
            ],
            'fecha_cita' => [
                'type' => 'DATE',
            ],
            'hora_cita' => [
                'type' => 'TIME',
            ],
            'status_cita' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'duracion_cita' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'citas_lote' => [
                'type' => 'BIT',
                'constraint' => 1,
                'default' => 0,
            ],
            'ciclo_servicio' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_paciente','pacientes','id','RESTRICT','CASCADE');
        $this->forge->addForeignKey('id_servicio','servicios','id','RESTRICT','CASCADE');
        $this->forge->createTable('citas_medicas');
    }

    public function down()
    {
        $this->forge->dropTable('citas_medicas');
    }
}

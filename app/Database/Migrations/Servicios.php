<?php

namespace CitasMedicas\Database\Migrations;

use CodeIgniter\Database\Migration;

class Servicios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre_servicio' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
                'unique' => true,
            ],
            'descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
            ],
            'detalle' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'hora_inicio_servicio' => [
                'type' => 'TIME',
            ],
            'hora_fin_servicio' => [
                'type' => 'TIME',
            ],
            'ciclo_citas_dia' => [
                'type' => 'TinyInt',
                'unsigned' => true
            ],
            'ciclos_citas_fin_de_semana' => [
                'type' => 'TinyInt',
                'unsigned' => true
            ],
            'duracion_cita' => [
                'type' => 'TinyInt',
                'unsigned' => true,
            ],
            'duracion_cita_lote' => [
                'type' => 'TinyInt',
                'unsigned' => true,
            ],
            'fin_de_semana' => [
                'type' => 'BIT'
            ],
        ]);

        //$this->forge->addKey('id', true);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('servicios');
    }

    public function down()
    {
        $this->forge->dropTable('servicios');
    }
}
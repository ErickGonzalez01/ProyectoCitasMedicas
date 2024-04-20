<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pacientes extends Migration
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
            'cedula' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
            ],
            'apellido' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
            ],
            'fecha_nacimiento' => [
                'type' => 'DATE',
            ],
            'telefono' => [
                'type' => 'VARCHAR',
                'constraint' => '8',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('cedula');
        $this->forge->createTable('pacientes');
    }

    public function down()
    {
        $this->forge->dropTable('pacientes');
    }
}

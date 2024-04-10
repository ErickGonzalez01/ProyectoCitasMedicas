<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Roll extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'descripcion' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ]
        ]);
        $this->forge->addUniqueKey('nombre');
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('roll', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        //
        $this->forge->dropTable('roll');
    }
}

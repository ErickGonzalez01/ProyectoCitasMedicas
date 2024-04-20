<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RollUsuario extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'id_roll' => [
                'type' => 'INT',
            ],
            'id_usuario' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_roll', 'roll', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_usuario', 'administracion', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('roll_usuario', true, ['ENGINE' => 'InnoDB']);

        $this->db->table('roll_usuario')->insert(['id_roll' => 8, 'id_usuario' => 1]);
        
    }

    public function down()
    {
        //
        $this->forge->dropTable('roll_usuario');
    }
}

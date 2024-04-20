<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Administacion extends Migration
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
            'correo' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
            ],
            'clave' => [
                'type' => 'CHAR',
                'constraint' => '60',
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
            ],
            'apellido' => [
                'type' => 'VARCHAR',
                'constraint' => '45',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('correo');
        $this->forge->createTable('administracion');

        $clave = \password_hash(12345678, PASSWORD_BCRYPT);
        $this->db->table('administracion')->insert(['correo' => 'prueba@erickgonzalez.xyz', 'clave' => $clave, 'nombre' => 'Erick', 'apellido' => 'Gonzalez']);
    }

    public function down()
    {
        $this->forge->dropTable('administracion');
    }
}

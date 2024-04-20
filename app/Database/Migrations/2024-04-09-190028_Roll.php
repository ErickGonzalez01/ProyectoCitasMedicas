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
        
        $this->db->table('roll')->insert(['nombre' => 'CREAR_CITA', 'descripcion' => 'Usuario puede crear una nueva cita.']);
        $this->db->table('roll')->insert(['nombre' => 'P_CREAR_CITA', 'descripcion' => 'Usuario puede ingresar a la pagina crear cita.']);
        $this->db->table('roll')->insert(['nombre' => 'P_CREAR_PACIENTE', 'descripcion' => 'Usuario puede ingresar a la pagina registrar paciente.']);
        $this->db->table('roll')->insert(['nombre' => 'CREAR_PACIENTE', 'descripcion' => 'Usuario puede registrar un nuevo paciente.']);
        $this->db->table('roll')->insert(['nombre' => 'P_CITAS_PROGRAMADAS', 'descripcion' => 'Usuario puede ver y buscar citas programadas.']);
        $this->db->table('roll')->insert(['nombre' => 'P_PACIENTE', 'descripcion' => 'Usuario puede ver la lista de pacientes.']);
        $this->db->table('roll')->insert(['nombre' => 'ADMIN', 'descripcion' => 'Usuario puede crear otros usuarios.']);
        $this->db->table('roll')->insert(['nombre' => 'ROOT', 'descripcion' => 'Usuario tiene control absoluto del sistema']);
    }

    public function down()
    {
        //
        $this->forge->dropTable('roll');
    }
}

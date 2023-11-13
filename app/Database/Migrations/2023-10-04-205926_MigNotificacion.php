<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigNotificacion extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'IdNot' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                'comment' => 'Id de la notificación',
            ],
            'IdUsu' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'comment' => 'Id del usuario',
            ],
            'IdReg' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
                'comment' => 'Id del registro',
            ],
            'Estado' => [
                'type' => 'ENUM("LEIDA", "NO LEIDA")',
                'default' => 'NO LEIDA',
                'comment' => 'Estado de la notificación',
            ],
            'FecEjec' => [
                'type' => 'date',
                'null' => true,
                'comment' => 'Fecha de Ejecución',
            ],
            'FecCre timestamp default current_timestamp',

        ]);
        $this->forge->addKey('IdNot', true);
        $this->forge->addForeignKey('IdReg', 'regevalmot', 'IdReg');
        $this->forge->addForeignKey('IdUsu', 'usuarios', 'IdUsu');
        $this->forge->createTable('notif', true, ['comment' => 'Registro de notificaciones']);
    }

    public function down()
    {
        $this->forge->dropTable('notif', true);
    }
}


<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdAsignacion extends Migration
{
    public function up()
    {
        $this->forge->addColumn('regevalmot', [
            'UsuTecAsig' => [
                'type' => 'int',
                'constraint' => 11,
                'comment' => 'MEL Motor',
                'unsigned' => true, // Asegura que sea un valor positivo
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('regevalmot', 'UsuTecAsig');
    }
}


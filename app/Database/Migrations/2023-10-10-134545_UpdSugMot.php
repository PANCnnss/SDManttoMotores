<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdSugMot extends Migration
{
	public function up()
	{
		$this->forge->addColumn('sugregmot', [
            'aviso' => [
                'type' => 'int',
                'constraint' => 20,
                'comment' => 'aviso de plan de accion',
                'unsigned' => true,
				'null' => true,
            ],
			'ot' => [
                'type' => 'int',
                'constraint' => 20,
                'comment' => 'OT',
                'unsigned' => true,
				'null' => true,
            ],
			'estado' =>[
				'type'           => 'ENUM',
				'constraint'     => ['PENDIENTE', 'COMPLETADA'],
				'default'        => 'PENDIENTE',
				'null' => false,
				'comment' => 'Indicador de estado del plan de accion',
			],
        ]);
	}

	public function down()
	{
		$this->forge->dropColumn("sugregmot","aviso");
		$this->forge->dropColumn("sugregmot","ot");
		$this->forge->dropColumn("sugregmot","estado");
	}
}

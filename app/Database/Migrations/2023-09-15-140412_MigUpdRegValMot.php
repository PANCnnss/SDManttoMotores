<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigUpdRegValMot extends Migration
{
	public function up()
	{
		$this->forge->addColumn("regevalmot",
		[
			'FecEjec' => [ 'type'=> 'date','null'=> true,'comment' => 'Fecha de Ejecucion',],

		]);

		$this->forge->modifyColumn("motores",
		[
			'fsMot' => [ 'type'=> 'decimal', 'constraint'=> '4,3','null'=> true,'comment' => 'FS Motor',],			
		]
	);
	}

	public function down()
	{
		$this->forge->dropColumn("regevalmot","FecEjec");
		$this->forge->dropColumn("motores","fsMot");
	}
}

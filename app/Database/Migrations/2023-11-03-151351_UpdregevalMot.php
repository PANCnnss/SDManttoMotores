<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdregevalMot extends Migration
{
	public function up()
	{
		$this->forge->addColumn("regevalmot",
		[
			'tecsEval' => [ 'type'=> 'JSON', 'null' => true,'comment' => 'Tecnicos encargados',],
		]);	
	}

	public function down()
	{
		$this->forge->dropColumn("regevalmot","tecsEval");
	}
}

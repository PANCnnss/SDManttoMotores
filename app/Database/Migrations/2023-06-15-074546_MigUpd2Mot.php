<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigUpd2Mot extends Migration
{
	public function up()
	{
		$this->forge->addColumn("motores",
		[
			'MEL' => [ 'type'=> 'varchar', 'constraint'=> 50,'comment' => 'MEL Motor',],
		]);
	}

	public function down()
	{
        $this->forge->dropColumn("motores","MEL");

	}
}

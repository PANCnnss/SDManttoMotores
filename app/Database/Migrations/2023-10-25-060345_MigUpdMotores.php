<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigUpdMotores extends Migration
{
	public function up()
	{
		$this->forge->addColumn("motores",
		[
			'diasInter' => [ 'type'=> 'varchar', 'constraint'=> 50,'comment' => 'Dias para siguiente intervencion',],


		]);
	}

	public function down()
	{
        $this->forge->dropColumn("motores","diasInter");
	}
}

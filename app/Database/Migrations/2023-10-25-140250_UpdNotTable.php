<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdNotTable extends Migration
{	public function up()
	{
		$this->forge->addColumn("notif",
		[
			'descripcion' => [ 'type'=> 'varchar', 'constraint'=> 250,'null'=> true,'comment' => 'Dias para siguiente intervencion',],

		]);
	}

	public function down()
	{
		$this->forge->dropColumn("notif","descripcion");
	}
}

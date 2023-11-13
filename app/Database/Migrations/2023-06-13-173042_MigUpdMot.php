<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigUpdMot extends Migration
{
	public function up()
	{
		//ADICION COLUMNA INVENCUSU HACE REFERENCIA AL USUARIO ENCARGADO DEL INVENTARIO DE EQUIPOS
		$this->forge->addColumn("motores",
		[
			'modelMot' => [ 'type'=> 'varchar', 'constraint'=> 50,'comment' => 'Modelo Motor',],
			'frameMot' => [ 'type'=> 'varchar', 'constraint'=> 50,'comment' => 'Frame Motor',],
			'fsMot' => [ 'type'=> 'int', 'constraint'=> 32,'comment' => 'Factor de Servicio',],
			'hzMot' => [ 'type'=> 'int', 'constraint'=> 32,'comment' => 'Hertz',],

		]);
	}

	public function down()
	{
        $this->forge->dropColumn("motores","modelMot");
        $this->forge->dropColumn("motores","frameMot");
        $this->forge->dropColumn("motores","fsMot");
        $this->forge->dropColumn("motores","hzMot");

	}
}

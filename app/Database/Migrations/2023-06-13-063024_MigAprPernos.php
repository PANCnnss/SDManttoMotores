<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigAprPernos extends Migration
{
	public function up()
	{
		// Motores
		$this->forge->addField([
			'IdPerno' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'auto_increment' => true, 'comment' => 'Id del perno',],
			'DmPulgadas' => [ 'type'=> 'varchar', 'constraint'=> 32,'comment' => 'Diametro Pulgadas',],
			'GradoDureza' => [ 'type'=> 'varchar', 'constraint'=> 64,'comment' => 'Grado de Dureza',],
			'Tipo' => [ 'type'=> 'varchar', 'constraint'=> 24,'comment' => 'Tipo',],
			'TorqueRequerido' => [ 'type'=> 'varchar', 'constraint'=> 24,'comment' => 'Torque Requerido',],
			'HilosXPulgada' => [ 'type'=> 'varchar', 'constraint'=> 24,'comment' => 'Hilos por pulgada',],
			'FecCre timestamp default now()',
			'FecMod' => [ 'type'=> 'date','null'=> true,'comment' => 'Fecha Modificación',],
			'FecDel' => [ 'type'=> 'date','null'=> true,'comment' => 'Fecha Eliminación',],
		]);
		$this->forge->addKey('IdPerno', true);
		$this->forge->createTable('apriettornillos',true, ['comment' => 'Registro de Datos de apriete de tornillos']);
	}

	public function down()
	{
		$this->forge->dropTable('apriettornillos',true);
	}
}

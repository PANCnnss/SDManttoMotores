<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigMantMot extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'IdMant' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'auto_increment' => true, 'comment' => 'Id del Mantenimiento',],
			'IdMot' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'null'=> true,'comment' => 'Id del Motor relacionado',],
			// 'Area' => [ 'type'=> 'varchar', 'constraint'=> 32,'comment' => 'Area',],
			'Desc' => [ 'type'=> 'varchar', 'constraint'=> 120,'comment' => 'Descripcion',],
			'FrecM' => [ 'type'=> 'varchar', 'constraint'=> 24,'comment' => 'FrecM',],
			'TipPar' =>[
				'type'           => 'ENUM',
				'constraint'     => ['Mayor', 'Menor'],
				'default'        => 'Mayor',
				'null' => false,
				'comment' => 'Tipo de parada',
			],
			'HH' => [ 'type'=> 'varchar', 'constraint'=> 24,'comment' => 'HH',],
			'Duracion' => [ 'type'=> 'varchar', 'constraint'=> 24,'comment' => 'Duracion',],
			'Cantidad' => [ 'type'=> 'varchar', 'constraint'=> 24,'comment' => 'Cantidad',],
			'FecM1' => [ 'type'=> 'date','null'=> true,'comment' => 'Fecha PM1',],
			'FecM2' => [ 'type'=> 'date','null'=> true,'comment' => 'Fecha PM2',],
			'ProxFec' => [ 'type'=> 'date','null'=> true,'comment' => 'Proxima Fecha',],
		]);
		$this->forge->addKey('IdMant', true);
		$this->forge->addForeignKey('IdMot','motores','IdMot');
		$this->forge->createTable('planMant',true, ['comment' => 'Registro de datos tabla plan de mantenimiento']);
	}

	public function down()
	{
		$this->forge->dropTable('planMant',true);
	}
}

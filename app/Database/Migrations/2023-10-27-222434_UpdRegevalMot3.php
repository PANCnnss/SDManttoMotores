<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdRegevalMot3 extends Migration
{

	public function up()
	{
		$this->forge->addColumn("regevalmot",
		[
			'trabR1' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Mantenimiento y limpieza de exterior de motor',],
			'trabR2' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Verificación de caja de conexiones',],
			'trabR3' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Desconexión y revisión de terminales',],
			'trabR4' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Verificación de torque de cable de fuerza',],
			'trabR5' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Verificación de torque de pernos de sujeción de la caja de conexiones hacia el motor',],
			'trabR6' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Verificación cambio de encapsulado de conexiones',],
			'trabR7' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Verificación del estado de cableado y conexionado de RTD y HEATER',],
			'trabR8' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Conexionado de terminales',],
			'trabR9' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Verificación del estado de las botoneras',],
			'trabR10' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Hermetizados de tapas',],
			'trabR11' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Inspección y limpieza de ventiladores',],
			'trabR12' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Inspección y limpieza de grasera',],
			'trabR13' => [ 'type'=> 'varchar', 'constraint'=> 255,'null'=> true,'comment' => 'Trabajo realizado (Otros)',],
		]);	
		
	}

	public function down()
	{
		$this->forge->dropColumn("regevalmot","trabR1");
		$this->forge->dropColumn("regevalmot","trabR2");
		$this->forge->dropColumn("regevalmot","trabR3");
		$this->forge->dropColumn("regevalmot","trabR4");
		$this->forge->dropColumn("regevalmot","trabR5");
		$this->forge->dropColumn("regevalmot","trabR6");
		$this->forge->dropColumn("regevalmot","trabR7");
		$this->forge->dropColumn("regevalmot","trabR8");
		$this->forge->dropColumn("regevalmot","trabR9");
		$this->forge->dropColumn("regevalmot","trabR10");
		$this->forge->dropColumn("regevalmot","trabR11");
		$this->forge->dropColumn("regevalmot","trabR12");
		$this->forge->dropColumn("regevalmot","trabR13");
	}
}

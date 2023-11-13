<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdMegMot extends Migration
{
	public function up()
	{
		$this->forge->addColumn("regmegmot",
		[
			'MPru2mLectReg' => [ 'type'=> 'decimal', 'constraint'=> '4,1','null'=> true,'comment' => 'Lectura Giga Ohms 2 minutos',],
			'MPru2mIndReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Índice Ej IA = 1.70',],
			'MPru2mObsReg' => [ 'type'=> 'varchar', 'constraint'=> 128,'null'=> true,'comment' => 'Observaciones',],

			'MPru3mLectReg' => [ 'type'=> 'decimal', 'constraint'=> '4,1','null'=> true,'comment' => 'Lectura Giga Ohms 3 minutos',],
			'MPru3mIndReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Índice Ej IA = 1.70',],
			'MPru3mObsReg' => [ 'type'=> 'varchar', 'constraint'=> 128,'null'=> true,'comment' => 'Observaciones',],

			'MPru4mLectReg' => [ 'type'=> 'decimal', 'constraint'=> '4,1','null'=> true,'comment' => 'Lectura Giga Ohms 4 minutos',],
			'MPru4mIndReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Índice Ej IA = 1.70',],
			'MPru4mObsReg' => [ 'type'=> 'varchar', 'constraint'=> 128,'null'=> true,'comment' => 'Observaciones',],
			
			'MPru5mLectReg' => [ 'type'=> 'decimal', 'constraint'=> '4,1','null'=> true,'comment' => 'Lectura Giga Ohms 5 minutos',],
			'MPru5mIndReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Índice Ej IA = 1.70',],
			'MPru5mObsReg' => [ 'type'=> 'varchar', 'constraint'=> 128,'null'=> true,'comment' => 'Observaciones',],

			'MPru6mLectReg' => [ 'type'=> 'decimal', 'constraint'=> '4,1','null'=> true,'comment' => 'Lectura Giga Ohms 6 minutos',],
			'MPru6mIndReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Índice Ej IA = 1.70',],
			'MPru6mObsReg' => [ 'type'=> 'varchar', 'constraint'=> 128,'null'=> true,'comment' => 'Observaciones',],

			'MPru7mLectReg' => [ 'type'=> 'decimal', 'constraint'=> '4,1','null'=> true,'comment' => 'Lectura Giga Ohms 7 minutos',],
			'MPru7mIndReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Índice Ej IA = 1.70',],
			'MPru7mObsReg' => [ 'type'=> 'varchar', 'constraint'=> 128,'null'=> true,'comment' => 'Observaciones',],

			'MPru8mLectReg' => [ 'type'=> 'decimal', 'constraint'=> '4,1','null'=> true,'comment' => 'Lectura Giga Ohms 8 minutos',],
			'MPru8mIndReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Índice Ej IA = 1.70',],
			'MPru8mObsReg' => [ 'type'=> 'varchar', 'constraint'=> 128,'null'=> true,'comment' => 'Observaciones',],

			'MPru9mLectReg' => [ 'type'=> 'decimal', 'constraint'=> '4,1','null'=> true,'comment' => 'Lectura Giga Ohms 9 minutos',],
			'MPru9mIndReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Índice Ej IA = 1.70',],
			'MPru9mObsReg' => [ 'type'=> 'varchar', 'constraint'=> 128,'null'=> true,'comment' => 'Observaciones',],
		]);	
	}

	public function down()
	{
		
		$this->forge->dropColumn("regmegmot","MPru2mLectReg");
		$this->forge->dropColumn("regmegmot","MPru2mIndReg");
		$this->forge->dropColumn("regmegmot","MPru2mObsReg");		
				
		$this->forge->dropColumn("regmegmot","MPru3mLectReg");
		$this->forge->dropColumn("regmegmot","MPru3mIndReg");
		$this->forge->dropColumn("regmegmot","MPru3mObsReg");
		
		$this->forge->dropColumn("regmegmot","MPru4mLectReg");
		$this->forge->dropColumn("regmegmot","MPru4mIndReg");
		$this->forge->dropColumn("regmegmot","MPru4mObsReg");
		
		$this->forge->dropColumn("regmegmot","MPru5mLectReg");
		$this->forge->dropColumn("regmegmot","MPru5mIndReg");
		$this->forge->dropColumn("regmegmot","MPru5mObsReg");
		
		$this->forge->dropColumn("regmegmot","MPru6mLectReg");
		$this->forge->dropColumn("regmegmot","MPru6mIndReg");
		$this->forge->dropColumn("regmegmot","MPru6mObsReg");
		
		$this->forge->dropColumn("regmegmot","MPru7mLectReg");
		$this->forge->dropColumn("regmegmot","MPru7mIndReg");
		$this->forge->dropColumn("regmegmot","MPru7mObsReg");
		
		$this->forge->dropColumn("regmegmot","MPru8mLectReg");
		$this->forge->dropColumn("regmegmot","MPru8mIndReg");
		$this->forge->dropColumn("regmegmot","MPru8mObsReg");
		
		$this->forge->dropColumn("regmegmot","MPru9mLectReg");
		$this->forge->dropColumn("regmegmot","MPru9mIndReg");
		$this->forge->dropColumn("regmegmot","MPru9mObsReg");

	}
}

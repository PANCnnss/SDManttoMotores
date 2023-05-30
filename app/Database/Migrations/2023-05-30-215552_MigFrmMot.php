<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigFrmMot extends Migration
{
	public function up()
	{
		// Usuarios
		// $this->forge->addField([
		// 	'IdUsu' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'auto_increment' => true,],
		// ]);
		// $this->forge->addKey('IdUsu', true);
		// $this->forge->addForeignKey('IdTUsu','tusuarios','IdTUsu');
		// $this->forge->createTable('usuarios',true);
	}

	public function down()
	{
		//
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdSugerencias extends Migration
{
	public function up()
	{
		$this->forge->addColumn("regevalmot",
		[
			'img1_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'img1_path' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

			'img2_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'img2_path' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

			'img3_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'img3_path' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
			
			'img4_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'img4_path' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

		]);
	}

	public function down()
	{
		$this->forge->dropColumn("regevalmot","img1_name");
		$this->forge->dropColumn("regevalmot","img1_path");

		$this->forge->dropColumn("regevalmot","img2_name");
		$this->forge->dropColumn("regevalmot","img2_path");

		$this->forge->dropColumn("regevalmot","img3_name");
		$this->forge->dropColumn("regevalmot","img3_path");
		
		$this->forge->dropColumn("regevalmot","img4_name");
		$this->forge->dropColumn("regevalmot","img4_path");
	}
}

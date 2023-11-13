<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigUpd3Mot extends Migration
{
	public function up()
	{
		$this->forge->addColumn("motores",
		[
			'image1_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image1_path' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

			'image2_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image2_path' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

			'image3_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image3_path' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

			'image4_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image4_path' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

			'image5_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image5_path' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

			'image6_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image6_path' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

			'image7_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image7_path' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

			'image8_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'image8_path' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
		]);
	}

	public function down()
	{
		$this->forge->dropColumn("motores","image1_name");
		$this->forge->dropColumn("motores","image1_name");

		$this->forge->dropColumn("motores","image2_name");
		$this->forge->dropColumn("motores","image2_name");

		$this->forge->dropColumn("motores","image3_name");
		$this->forge->dropColumn("motores","image3_name");
		
		$this->forge->dropColumn("motores","image4_name");
		$this->forge->dropColumn("motores","image4_name");
		
		$this->forge->dropColumn("motores","image5_name");
		$this->forge->dropColumn("motores","image5_name");
		
		$this->forge->dropColumn("motores","image6_name");
		$this->forge->dropColumn("motores","image6_name");
		
		$this->forge->dropColumn("motores","image7_name");
		$this->forge->dropColumn("motores","image7_name");
		
		$this->forge->dropColumn("motores","image8_name");
		$this->forge->dropColumn("motores","image8_name");

	}
}

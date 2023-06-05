<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LoginS extends Seeder
{
	public function run()
	{
		// Limpiar
		$this->db->disableForeignKeyChecks();
		$this->db->query('TRUNCATE menus_tusuarios');
		$this->db->query('TRUNCATE tusuarios');
		$this->db->query('TRUNCATE menus');
		// $this->db->query('TRUNCATE usuarios');
		

		$all = [];
		$all["tusuarios"] = [
			"camps" => [
				'NomTUsu'
			],
			"data" => [
				// ['Técnico'], //1
				// ['Supervisor'], //2
				// ['Admin'], //3
			],
		];
		$all["menus"] = [
			"camps" => [
				'PadMenu','NomMenu','SubMenu','IconMenu','UrlMenu','OrdMenu','EstMenu'
			],
			"data" => [
				['0','PERSONAL','','ti-id-badge','','1','1'], //1 Personal
				['1','Diario','D','','dashs/diario','1','1'], //2 DASH
				['1','Mensual','M','','dashs/mensual','1','1'], //3
				['0','PERSONAL','','ti-id-badge','','1','1'], //4 Personal
				['4','Lista','l','','dashs/diario','1','1'], //5 Dash diario
				['0','MANTTO MOT','','ti-id-badge','','1','1'], //6 Mantenimiento motores
				['6','Lista','l','','manttomot','1','1'], //7
				['0','USUARIOS','','ti-id-badge','','1','1'], //8 Usuarios del sistema
				['8','Lista','l','','manttomot','1','1'], //9
			],
		];
		$all["menus_tusuarios"] = [
			"camps" => [
				'IdMenu','IdTUsu'
			],
			"data" => [
				// TEC
				['6','1',],
				['7','1',],
				// SUP
				['6','2',],
				['7','2',],
				// ADMIN
				['8','3',],
				['9','3',],
			],
		];
		$all["usuarios"] = [
			"camps" => [
				'NomUsu','LogUsu','ConUsu','IdTUsu'
			],
			"data" => [
				// TRAB
				// ['TECNICO 1','TEC1',password_hash("Asdf1234", PASSWORD_DEFAULT),"1"],
				// // JEFE
				// ['SUPERVISOR 1','SUP1',password_hash("Asdf1234", PASSWORD_DEFAULT),"2"],
				// // ADMIN
				// ['ADMIN 1','ADMIN1',password_hash("Asdf1234", PASSWORD_DEFAULT),"3"],
				
			],
		];
		echo "-------------SEED----------------\n";
		foreach ($all as $k => $tab){
			$camp = $tab['camps'];
			$nreg = 0;
			foreach ($tab['data'] as $r){
				$dt = [];
				$i = 0;
				foreach ($r as $c)
					$dt[$camp[$i ++]] = $c;
				$this->db->table($k)->insert($dt);
				$nreg++;
			}
			echo "\t Seed $k ($nreg) \n";
		}
		$this->db->enableForeignKeyChecks();
	}
}

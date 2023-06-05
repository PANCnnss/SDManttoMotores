<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MotTestSeeder extends Seeder
{
	public function run()
	{
		// Limpiar
		$this->db->disableForeignKeyChecks();
		$this->db->query('TRUNCATE motores');
		$this->db->query('TRUNCATE paradas');
		$this->db->enableForeignKeyChecks();

		$all = [];
		$all["motores"] = [
			"camps" => [
				'NomMot','TagMot','MarcaMot','SerieMot','PotenciaMot','TensionMot','CorrienteMot','VelocidadMot','UsuCre','FecCre','FecMod','FecDel'
			],
			"data" => [
				['FET-0005-M1','Motor Electrico FET-0005-M1','SIEMENS','C11T3022SE-14','3 HP','230/460 V','8.6/4.3 A','1175','1','2023-06-05 09:42:09.000',NULL,NULL],
			],
		];
		$all["paradas"] = [
			"camps" => [
				'NomPar','DescPar','FecIni','FecFin','FecCre','FecMod','FecDel','UsuCre','UsuSup','Estado'
			],
			"data" => [
				['PARADA 05-06-07-08-10-22 OCTUBRE','MA-0830-22 SERVICIO DE MANTENIMIENTO PREVENTIVO DE MOTORES JAULA DE ARDILLA DE PLANTA CONCENTRADORA ANTAPACAY, PARADA OCTUBRE 2022','2023-06-05 00:00:00.000','2023-06-11 00:00:00.000','2023-06-05 09:39:44.000',null,null,'1','2','0'],
			],
		];
		$all["regevalmot"] = [
			"camps" => [
				'IdPar','UsuCre','UsuSup',
			],
			"data" => [
				['1','1','2'],
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
	}
}

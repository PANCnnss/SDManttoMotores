<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigFrmMot extends Migration
{
	public function up()
	{
		// Imagenes
			$this->forge->addField([
				'IdImg' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'auto_increment' => true, 'comment' => 'Id Imagen',],
				'TipImg' => [ 'type'=> 'INT', 'constraint'=> 1, 'default' => 0,'comment' => 'Tipo de Imagen (0: Registro Pernos)',],
				'IdRef' => [ 'type'=> 'INT', 'constraint'=> 11, 'unsigned'=> true,'comment' => 'Id referencia a la tabla que corresponda',],
				'UrlImg' => [ 'type'=> 'varchar', 'constraint'=> 128,'comment' => 'Url de la imagen',],
				'TypeImg' => [ 'type'=> 'varchar', 'constraint'=> 24,'comment' => 'Mymetype de la imagen',],
				'PesoImg' => [ 'type'=> 'INT', 'constraint'=> 11,'comment' => 'Peso en Mb',],
				'UsuCre' => [ 'type'=> 'INT', 'constraint'=> 11, 'unsigned'=> true, 'comment' => 'Usuario Creador',],
				'FecCre timestamp default now()',
			]);
			$this->forge->addKey('IdImg', true);
			$this->forge->addForeignKey('UsuCre','usuarios','IdUsu');
			$this->forge->createTable('imagenes',true);

		// Paradas
			$this->forge->addField([
				'IdPar' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'auto_increment' => true, 'comment' => 'Id Parada',],
				'NomPar' => [ 'type'=> 'varchar', 'constraint'=> 64,'comment' => 'Nombre',],
				'NomArea' => [ 'type'=> 'varchar', 'null'=>true, 'constraint'=> 64,'comment' => 'Nombre del Área',],
				'DescPar' => [ 'type'=> 'varchar', 'constraint'=> 128,'comment' => 'Descripción detallada Parada',],
				'FecIni' => [ 'type'=> 'datetime','comment' => 'Fecha Inicio',],
				'FecFin' => [ 'type'=> 'datetime','comment' => 'Fecha Fin',],
				'FecCre timestamp default now()',
				'FecMod' => [ 'type'=> 'date','null'=> true,'comment' => 'Fecha Modificación',],
				'FecDel' => [ 'type'=> 'date','null'=> true,'comment' => 'Fecha Eliminación',],
				'UsuCre' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'comment' => 'Usuario Creador',],
				'UsuSup' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'comment' => 'Usuario Supervisor',],
				'Estado' => [ 'type'=> 'INT', 'constraint'=> 1, 'default'=> 0,'comment' => 'Estado parada, 0: Pendiente (defecto), 1: Iniciado (Tecnico), 2: Completado (Tecnico) [Deshabilita Edición], 3: Entregado (Supervisor)',],
			]);
			$this->forge->addKey('IdPar', true);
			$this->forge->addForeignKey('UsuCre','usuarios','IdUsu');
			$this->forge->addForeignKey('UsuSup','usuarios','IdUsu');
			$this->forge->createTable('paradas',true, ['comment' => 'Listado de Paradas, cada una contiene un conjunto de registros']);

		// Motores
			$this->forge->addField([
				'IdMot' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'auto_increment' => true, 'comment' => 'Id Motor',],
				'NomMot' => [ 'type'=> 'varchar', 'constraint'=> 32,'comment' => 'Nombre',],
				'TagMot' => [ 'type'=> 'varchar', 'constraint'=> 64,'comment' => 'Tag identificador',],
				'MarcaMot' => [ 'type'=> 'varchar', 'constraint'=> 24,'comment' => 'Marca',],
				'SerieMot' => [ 'type'=> 'varchar', 'constraint'=> 24,'comment' => 'Nro de Serie',],
				'PotenciaMot' => [ 'type'=> 'INT', 'constraint'=> 4,'comment' => 'Potencia en HP',],
				'TensionMot' => [ 'type'=> 'varchar', 'constraint'=> 24,'comment' => 'Tensión en x/y Voltios',],
				'CorrienteMot' => [ 'type'=> 'varchar', 'constraint'=> 24,'comment' => 'Corriente x/y Amperios',],
				'VelocidadMot' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'comment' => 'Velocidad',],
				'UsuCre' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'comment' => 'Usuario Creador',],
				'FecCre timestamp default now()',
				'FecMod' => [ 'type'=> 'date','null'=> true,'comment' => 'Fecha Modificación',],
				'FecDel' => [ 'type'=> 'date','null'=> true,'comment' => 'Fecha Eliminación',],
			]);
			$this->forge->addKey('IdMot', true);
			$this->forge->addForeignKey('UsuCre','usuarios','IdUsu');
			$this->forge->createTable('motores',true, ['comment' => 'Registro de Datos de los motores']);

		// Registro Evaluación
			$this->forge->addField([
				'IdReg' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'auto_increment' => true, 'comment' => 'Id Imagen',],
				'UsuCre' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'comment' => 'Usuario que crea el Registro',],
				'UsuMod' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'null'=> true,'comment' => 'Usuario que Edita el Registro (Por última vez)',],
				'UsuSup' => [ 'type'=> 'INT', 'constraint'=> 11,'null'=> true,'unsigned'=> true,'null'=> true,'comment' => 'Usuario Supervisor',],
				'IdPar' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'null'=> true,'comment' => 'Id Parada',],
				'FecCre timestamp default now()',
				'FecMod' => [ 'type'=> 'date','null'=> true,'comment' => 'Fecha Modificación',],
				'FecDel' => [ 'type'=> 'date','null'=> true,'comment' => 'Fecha Eliminación',],
				'FecEfec' => [ 'type'=> 'date','comment' => 'Fecha Efectuado',],
				'IdMot' => [ 'type'=> 'INT', 'unsigned'=> true,'constraint'=> 11,'comment' => 'Id del motor evaluado',],
				'EstReg' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Estado del Registro, 0: Pendiente (defecto), 1: Iniciado (Tecnico), 2: Completado (Tecnico) [Deshabilita Edición], 3: Entregado (Supervisor)',],
				'HabPruResTieReg' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Habilitado Pruebas de Resistencia de Aislamiento a Tierra',],
				'HabPruResOhmReg' => [ 'type'=> 'INT', 'constraint'=> 11,'default'=> 0,'comment' => 'Habilitado Pruebas de Resistencia Óhmica',],
				'HabTorqueReg' => [ 'type'=> 'INT', 'constraint'=> 1,'default'=> 0,'comment' => 'Habilitado Solicita Torque de Pernos',],
					'TorLimPerReg' => [ 'type'=> 'INT', 'constraint'=> 1,'null'=> true,'comment' => 'Limpieza Pernos (0: No, 1: Sí, 2: N/A)',],
					'TorLimTueReg' => [ 'type'=> 'INT', 'constraint'=> 1,'null'=> true,'comment' => 'Limpieza Tuercas (0: No, 1: Sí, 2: N/A)',],
					'TorLimCarReg' => [ 'type'=> 'INT', 'constraint'=> 1,'null'=> true,'comment' => 'Limpieza Caras de Bridas (0: No, 1: Sí, 2: N/A)',],
					'TorRevPerReg' => [ 'type'=> 'INT', 'constraint'=> 1,'null'=> true,'comment' => 'Pernos Revisados (0: No, 1: Sí, 2: N/A)',],
				'LlaveRangoReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Rango',],
				'LlaveMarcaReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Marca',],
				'LlaveNroCertReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'N° Certificado',],
				'LlaveNroSerieReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'N° Serie',],
			]);
			$this->forge->addKey('IdReg', true);
			$this->forge->addForeignKey('UsuCre','usuarios','IdUsu');
			$this->forge->addForeignKey('UsuMod','usuarios','IdUsu');
			$this->forge->addForeignKey('IdPar','paradas','IdPar');
			$this->forge->createTable('regevalmot',true, ['comment' => 'Registro evaluación de motores']);
		
		// Sugerencias Registro Motor
			$this->forge->addField([
				'IdSug' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'auto_increment' => true, 'comment' => 'Id Sugerencia',],
				'IdReg' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true, 'default' => 0,'comment' => '',],
				'TextoSug' => [ 'type'=> 'varchar', 'constraint'=> 128, 'default' => 0,'comment' => '',],
				'CritiSug' => [ 'type'=> 'INT', 'constraint'=> 1, 'default' => 0,'comment' => 'Criticidad 1: Correcto, 2: Advertencia, 3: Grave',],
				'IdTec' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'comment' => 'Id del técnico que generó la sugerencia',],
				'FecSug timestamp default now()',
			]);
			$this->forge->addKey('IdSug', true);
			$this->forge->addForeignKey('IdTec','usuarios','IdUsu');
			$this->forge->addForeignKey('IdReg','regevalmot','IdReg');
			$this->forge->createTable('sugregmot',true, ['comment' => 'Sugerencias Registro Motor']);


		// Registro perno motor
			$this->forge->addField([
				'IdRegPer' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'auto_increment' => true, 'comment' => 'Id Imagen',],
				'IdReg' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'comment' => 'Id del registro Motor',],
				'NroPer' => [ 'type'=> 'varchar', 'constraint'=> 24,'comment' => 'Nro de Perno',],
				'GDurPer' => [ 'type'=> 'INT', 'constraint'=> 4,'comment' => 'Grado de Dureza',],
				'TipPer' => [ 'type'=> 'INT', 'constraint'=> 1,'comment' => 'Tipo Perno (0: SECO)',],
				'DiaPulPer' => [ 'type'=> 'varchar', 'constraint'=> 8,'comment' => 'Diámetro de Pulgada',],
				'TorMedPer' => [ 'type'=> 'INT', 'constraint'=> 4,'comment' => 'Torque Medido (ft/lb)',],
				'FecPer timestamp default now()',
				'ObsPer' => [ 'type'=> 'varchar', 'constraint'=> 128,'default'=> '','comment' => 'observaciones',],
			]);
			$this->forge->addKey('IdRegPer', true);
			$this->forge->addForeignKey('IdReg','regevalmot','IdReg');
			$this->forge->createTable('regpermot',true, ['comment' => 'Registro Perno Motor']);
		// Registro Megómetro - Pruebas resistencia Tierra
			$this->forge->addField([
				'IdRegMeg' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'auto_increment' => true, 'comment' => 'Id Imagen',],
				'IdReg' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true, 'default' => 0,'comment' => '',],
				'MegMegaReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Megómetro Megabras nombre',],
				'MegSerieReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Número de Serie Megómetro',],
				'MegTpruReg' => [ 'type'=> 'varchar', 'constraint'=> 48,'null'=> true,'comment' => 'Tensión de Pruebas',],
				'MegTambReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Temperatura Ambiente',],
				'MegTiPruReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Tiempo de Prueba',],
				'MPru30sLectReg' => [ 'type'=> 'decimal', 'constraint'=> '4,1','null'=> true,'comment' => 'Lectura Giga Ohms 30 segundos',],
				'MPru30sIndReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Índice Ej IA = 1.70',],
				'MPru30sObsReg' => [ 'type'=> 'varchar', 'constraint'=> 128,'null'=> true,'comment' => 'Observaciones',],
				'MPru60sLectReg' => [ 'type'=> 'decimal', 'constraint'=> '4,1','null'=> true,'comment' => 'Lectura Giga Ohms 30 segundos',],
				'MPru60sIndReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Índice Ej IA = 1.70',],
				'MPru60sObsReg' => [ 'type'=> 'varchar', 'constraint'=> 128,'null'=> true,'comment' => 'Observaciones',],
			]);
			$this->forge->addKey('IdRegMeg', true);
			$this->forge->addForeignKey('IdReg','regevalmot','IdReg');
			$this->forge->createTable('regmegmot',true, ['comment' => 'Registro Megómetro Motor']);
		// Registro Microhmímetro - Pruebas resistencia Óhmica
			$this->forge->addField([
				'IdRegMic' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true,'auto_increment' => true, 'comment' => 'Id Imagen',],
				'IdReg' => [ 'type'=> 'INT', 'constraint'=> 11,'unsigned'=> true, 'default' => 0,'comment' => '',],
				'MicMetReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Metrel de Microhmímetro',],
				'MicCertCalReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'N° Cert Calibración',],
				'MicTempAmbReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Temperatura Ambiente Microhmímetro',],
				'MicConPruReg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Conexión de Prueba',],
				'MicLec12Reg' => [ 'type'=> 'decimal', 'constraint'=> '4,3','null'=> true,'comment' => 'Lectura en Ohmios',],
				'MicLec23Reg' => [ 'type'=> 'decimal', 'constraint'=> '4,3','null'=> true,'comment' => 'Lectura en Ohmios',],
				'MicLec31Reg' => [ 'type'=> 'decimal', 'constraint'=> '4,3','null'=> true,'comment' => 'Lectura en Ohmios',],
				'MicDes12Reg' => [ 'type'=> 'decimal', 'constraint'=> '4,3','null'=> true,'comment' => 'Desbalance en Porcentaje',],
				'MicDes23Reg' => [ 'type'=> 'decimal', 'constraint'=> '4,3','null'=> true,'comment' => 'Desbalance en Porcentaje',],
				'MicDes31Reg' => [ 'type'=> 'decimal', 'constraint'=> '4,3','null'=> true,'comment' => 'Desbalance en Porcentaje',],
				'MicRes12Reg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Resultado en texto',],
				'MicRes23Reg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Resultado en texto',],
				'MicRes31Reg' => [ 'type'=> 'varchar', 'constraint'=> 24,'null'=> true,'comment' => 'Resultado en texto',],
				'MicObs12Reg' => [ 'type'=> 'varchar', 'constraint'=> 128,'null'=> true,'comment' => 'Observaciones',],
				'MicObs23Reg' => [ 'type'=> 'varchar', 'constraint'=> 128,'null'=> true,'comment' => 'Observaciones',],
				'MicObs31Reg' => [ 'type'=> 'varchar', 'constraint'=> 128,'null'=> true,'comment' => 'Observaciones',],
			]);
			$this->forge->addKey('IdRegMic', true);
			$this->forge->addForeignKey('IdReg','regevalmot','IdReg');
			$this->forge->createTable('regmicmot',true, ['comment' => 'Registro Microhmimetro Motor']);
	}

	public function down()
	{
		$this->forge->dropTable('imagenes',true);
		$this->forge->dropTable('motores',true);
		$this->forge->dropTable('sugregmot',true);
		// $this->forge->dropTable('regmegmot',true);
		// $this->forge->dropTable('regmicmot',true);
		$this->forge->dropTable('regevalmot',true);
		$this->forge->dropTable('paradas',true);
	}
}

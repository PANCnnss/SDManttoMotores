<?php

namespace App\Models;

use CodeIgniter\Model;

class QueryModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'queries';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [];

	//Query model para facilitar las consultas
	public function edit($table,$data)
	{
		# code...
	}
}

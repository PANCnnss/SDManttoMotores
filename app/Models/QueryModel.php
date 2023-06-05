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
	public function list($table,$data,$where)
	{
		$r = $this->db->table($table)->select($data)->where($where)->get()->getResultArray();
		return $r;
	}
	public function edit($table,$data,$where)
	{
		# code...
	}
	public function del($table,$where)
	{
		# code...
	}
	public function getOptArray($table,$text,$id,$where,$selEmpty=false) //Obtener un arreglo de opciones para los selects
	{
		$r = $this->db->table($table)->select("$text,$id")->where($where)->get()->getResultArray();
		if($selEmpty) $opts = [""=>"Seleccionar"];
		else $opts = [];

		foreach ($r as $opt)
			$opts[$opt[$id]] = $opt[$text];
		
		return $opts;
	}
}

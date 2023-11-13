<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
//Por adaptar al ejemplo general
class Manttomot extends BaseController
{
	public $data;
	public $model;
	use ResponseTrait;
	public function __construct() {
		$this->data = [
			'title' => 'SDISE - Mantenimiento Motores',
			'ctrl' => 'manttomot',
			'rol' => null,
		];
		$this->data["js"] = [
			base_url('theme/src/assets/libs/jquery/dist/jquery.min.js'),
			base_url('theme/src/assets/libs/popper.js/dist/umd/popper.min.js'),
			base_url('theme/src/assets/libs/bootstrap/dist/js/bootstrap.min.js'),
			base_url('theme/dist/js/app.min.js'),
			base_url('theme/src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js'),
			base_url('theme/src/assets/extra-libs/sparkline/sparkline.js'),
			base_url('theme/src/assets/libs/datatables/media/js/jquery.dataTables.min.js'),
			base_url('theme/dist/js/app.init.horizontal.js'),
			base_url('theme/dist/js/app-style-switcher.horizontal.js'),
			base_url('theme/dist/js/waves.js'),
			base_url('theme/dist/js/sidebarmenu.js'),
			base_url('theme/dist/js/custom.min.js'),
			base_url('theme/dist/js/pages/datatable/custom-datatable.js'),
			base_url('theme/dist/js/pages/datatable/datatable-api.init.js'),
			base_url('theme/src/assets/extra-libs/toastr/toastr-init.js'),
			base_url('theme/src/assets/extra-libs/toastr/dist/build/toastr.min.js'),
			base_url('theme/src/assets/libs/sweetalert2/dist/sweetalert2.all.min.js'),
			base_url('theme/src/assets/extra-libs/sweetalert2/sweet-alert.init.js'),
			base_url('resources/assets/js/filepond/filepond.min.js'),
			base_url('theme/src/assets/libs/moment/moment.js'),
			base_url('resources/assets/js/bootstrap-datetimepicker.js'),
		];
		$this->data["css"] = [
			'https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
			'https://fonts.googleapis.com/css?family=Muli:400,300',
			base_url('theme/src/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css'),
			base_url('theme/src/assets/extra-libs/toastr/dist/build/toastr.min.css'),
			base_url('theme/dist/css/style.css'),
			base_url('resources/assets/js/filepond/filepond.min.css'),
		];
		$this->model = model("QueryModel");
		if(session()->get("IdTUsu")) $this->data["rol"] = session()->get()["IdTUsu"];
		helper('form');
	}
	public function index()
	{
		if(!session()->get("IdUsu")) return redirect()->to('/login');

		$d = $this->data;
		$d["cols"] = json_encode([
			["data"=> 'IdPar', "title"=> "ID", "className"=> "text-center"], 
			["data"=> 'NomPar', "title"=> "Nombre", "className"=> "text-center"], 
			["data"=> 'DescPar', "title"=> "Descripción", "className"=> "text-center"], 
			["data"=> 'FecIni', "title"=> "Inicio", "className"=> "text-center"], 
			["data"=> 'FecFin', "title"=> "Fin", "className"=> "text-center"], 
			["data"=> 'NomUsuCre', "title"=> "Tecnico", "className"=> "text-center"], 
			["data"=> 'NomUsuCre', "title"=> "Supervisor", "className"=> "text-center"], 
			["data"=> 'EstPar', "title"=> "Estado", "className"=> "text-center"], 
			["data"=> null, "defaultContent" => "", "title" => "ACCIONES"], //Acciones
		]);
		$d["colsr"] = json_encode([ //Columnas liqs trabajadores
			["data"=> 'IdReg', "title"=> "ID", "className"=> "text-center"], 
			["data"=> 'NomMot', "title"=> "Nombre Motor", "className"=> "text-center", "visible"=> true], 
			["data"=> 'TagMot', "title"=> "Tag Motor", "className"=> "text-center", "visible"=> true], 
			["data"=> 'NomUsuSup', "title"=> "Supervisor", "className"=> "text-center", "visible"=> true], 
			["data"=> 'FecEjec', "title"=> "Fecha", "className"=> "text-center"], 
			["data"=> 'EstReg', "title"=> "Estado", "className"=> "text-center"], 
			["data"=> null, "defaultContent" => "", "title" => "ACCIONES"], //Acciones
		]);
		//JS
			array_push($d["js"],base_url('theme/dist/js/custom.min.js'));
			array_push($d["js"],'https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js');
			array_push($d["js"], base_url("resources/assets/js/lists.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-file-validate-size.min.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-file-validate-type.min.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-image-edit.min.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-image-exif-orientation.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-media-preview.min.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-image-preview.min.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-get-file.min.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-image-overlay.min.js")); //js para todas las listas
			
			array_push($d["css"],base_url('theme/dist/css/style.min.css'));
			array_push($d["css"],'https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css');
			array_push($d["css"], base_url("resources/assets/js/filepond/filepond-plugin-image-edit.min.css")); //js para todas las listas
			array_push($d["css"], base_url("resources/assets/js/filepond/filepond-plugin-media-preview.min.css")); //js para todas las listas
			array_push($d["css"], base_url("resources/assets/js/filepond/filepond-plugin-image-preview.min.css")); //js para todas las listas
			array_push($d["css"], base_url("resources/assets/js/filepond/filepond-plugin-get-file.min.css")); //js para todas las listas
			array_push($d["css"], base_url("resources/assets/js/filepond/filepond-plugin-image-overlay.min.css")); //js para todas las listas
		
		return view('manttomot/lista',$d);
	}

	public function dashSup()
	{
		if(!session()->get("IdUsu")) return redirect()->to('/login');
		$d = $this->data;

		$d["data"] = $this->model->db->table('regevalmot')
					->select("*, GROUP_CONCAT(sugregmot.TextoSug) as 'datos_concatenados', GROUP_CONCAT(sugregmot.ot) as 'OT',GROUP_CONCAT(sugregmot.aviso) as 'avisos'")
					->join('paradas', 'paradas.IdPar = regevalmot.IdPar','left')
					->join('motores', 'motores.IdMot = regevalmot.IdMot','left')
					->join('regmegmot', 'regmegmot.IdReg = regevalmot.IdReg','left')
					->join('sugregmot', 'sugregmot.IdReg = regevalmot.IdReg','left')
					->where('regevalmot.EstReg !=', 3) 
					->groupBy('regevalmot.IdReg') // Agrupar por IdReg
					->get()
					->getResultArray();
		
		$d["data2"] = $this->model->db->table('regevalmot')
					->select("*, GROUP_CONCAT(sugregmot.TextoSug) as 'datos_concatenados', GROUP_CONCAT(sugregmot.ot) as 'OT',GROUP_CONCAT(sugregmot.aviso) as 'avisos'")
					->join('paradas', 'paradas.IdPar = regevalmot.IdPar')
					->join('motores', 'motores.IdMot = regevalmot.IdMot')
					->join('regmegmot', 'regmegmot.IdReg = regevalmot.IdReg')
					->join('sugregmot', 'sugregmot.IdReg = regevalmot.IdReg')
					// ->where('regevalmot.EstReg !=', 3) 
					->groupBy('regevalmot.IdReg') // Agrupar por IdReg
					->limit(8) 
					->get()
					->getResultArray();
		
		$d["data3"] = $this->model->db->table('regevalmot')
					->select("*, GROUP_CONCAT(sugregmot.TextoSug) as 'datos_concatenados', GROUP_CONCAT(sugregmot.ot) as 'OT',GROUP_CONCAT(sugregmot.aviso) as 'avisos'")
					->join('paradas', 'paradas.IdPar = regevalmot.IdPar','left')
					->join('motores', 'motores.IdMot = regevalmot.IdMot','left')
					->join('regmegmot', 'regmegmot.IdReg = regevalmot.IdReg','left')
					->join('sugregmot', 'sugregmot.IdReg = regevalmot.IdReg','left')
					// ->where('regevalmot.EstReg !=', 3) 
					->groupBy('regevalmot.IdReg') // Agrupar por IdReg
					->get()
					->getResultArray();

		//JS
			array_push($d["js"],base_url('theme/dist/js/custom.min.js'));
			array_push($d["js"],'https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js');
			array_push($d["js"], base_url("resources/assets/js/lists.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-file-validate-size.min.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-file-validate-type.min.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-image-edit.min.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-image-exif-orientation.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-media-preview.min.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-image-preview.min.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-get-file.min.js")); //js para todas las listas
			array_push($d["js"], base_url("resources/assets/js/filepond/filepond-plugin-image-overlay.min.js")); //js para todas las listas
			
			array_push($d["css"],base_url('theme/dist/css/style.min.css'));
			array_push($d["css"],'https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css');
			array_push($d["css"], base_url("resources/assets/js/filepond/filepond-plugin-image-edit.min.css")); //js para todas las listas
			array_push($d["css"], base_url("resources/assets/js/filepond/filepond-plugin-media-preview.min.css")); //js para todas las listas
			array_push($d["css"], base_url("resources/assets/js/filepond/filepond-plugin-image-preview.min.css")); //js para todas las listas
			array_push($d["css"], base_url("resources/assets/js/filepond/filepond-plugin-get-file.min.css")); //js para todas las listas
			array_push($d["css"], base_url("resources/assets/js/filepond/filepond-plugin-image-overlay.min.css")); //js para todas las listas
		
		return view('manttomot/dashSup',$d);
	}

	public function ajaxDashSup()
	{
		$data = $this->model->db->table('regevalmot')
					->select("*, GROUP_CONCAT(sugregmot.TextoSug) as 'datos_concatenados'")
					->join('paradas', 'paradas.IdPar = regevalmot.IdPar')
					->join('motores', 'motores.IdMot = regevalmot.IdMot')
					->join('regmegmot', 'regmegmot.IdReg = regevalmot.IdReg')
					->join('sugregmot', 'sugregmot.IdReg = regevalmot.IdReg')
					// ->where('regevalmot.EstReg !=', 3) 
					->groupBy('regevalmot.IdReg')
					->orderBy('FecEjec', 'ASC') 
					->get()
					->getResultArray();
		return $this->response->setJSON($data);
	}

	public function dataPDF($id) {
		$data = $this->model->db->table('regevalmot')
			->select('*')
				->join('paradas', 'paradas.IdPar = regevalmot.IdPar','left')
				->join('motores', 'motores.IdMot = regevalmot.IdMot', 'left')
				->join('regmegmot', 'regmegmot.IdReg = regevalmot.IdReg', 'left')
				->where('regevalmot.IdReg', $id)
			->get()
			->getRowArray(); 
	
		return $this->setResponseFormat('json')->respond(["data" => $data]);
	}

	public function filtroMotores(){
		$data = $this->model->db->table('regevalmot')
		->select('*')
			->join('paradas', 'paradas.IdPar = regevalmot.IdPar','left')
			->join('motores', 'motores.IdMot = regevalmot.IdMot')
			->join('regmegmot', 'regmegmot.IdReg = regevalmot.IdReg', 'left')
			->orderBy('FecEjec', 'ASC') 
		->get()
		->getResultArray(); 
		return $this->response->setJSON($data);
	}

	public function nuevoreg() //Nuevo Registro del Motor
	{
		if(!session()->get("IdUsu")) return redirect()->to('/login');
		$d = $this->data;
		// JS
			array_push($d["js"],'https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js');
			array_push($d["js"],base_url('theme/src/assets/libs/select2/dist/js/select2.full.min.js'));
			array_push($d["js"],base_url('theme/src/assets/libs/select2/dist/js/select2.min.js'));
			array_push($d["js"],base_url('theme/dist/js/pages/forms/select2/select2.init.js'));
			array_push($d["js"], base_url('theme/src/assets/libs/jquery-validation/dist/jquery.validate.min.js')); //js para todos los forms
			array_push($d["js"], base_url('theme/src/assets/libs/jquery-validation/dist/additional-methods.js')); //js para todos los forms 
			array_push($d["js"], base_url('resources/assets/js/bootstrap-datetimepicker.js'));
			array_push($d["js"], base_url("resources/assets/js/forms.js")); //js para todos los forms
			array_push($d["js"], base_url("theme/src/assets/libs/dropzone/dist/min/dropzone.min.js")); //js para todos los forms
		//CSS
			array_push($d["css"],base_url('theme/src/assets/libs/select2/dist/css/select2.min.css'));
			array_push($d["css"],base_url('theme/src/assets/libs/dropzone/dist/min/dropzone.min.css'));
			array_push($d["css"],'https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css');

		return view('manttomot/nuevo',$d);
	}
	public function editar($id)
	{
		if(!session()->get("IdUsu")) return redirect()->to('/login');
		$d = $this->data;
		
		$d["id"] = $id;

		$d["resultado1"] = $this->model->db->table('regevalmot')
		->select('regevalmot.*, regmegmot.*, regmicmot.*, motores.*, paradas.*, usuarios.*,asig.NomUsu as "encUsu"')
		->join('motores', 'motores.IdMot = regevalmot.IdMot', 'left')
		->join("paradas","paradas.IdPar = regevalmot.IdPar",'left')
		->join('regmegmot', 'regmegmot.IdReg = regevalmot.IdReg', 'left')
		->join('regmicmot', 'regmicmot.IdReg = regevalmot.IdReg', 'left')
		->join("usuarios","usuarios.IdUsu = regevalmot.UsuCre",'left')
		->join("usuarios asig","asig.IdUsu = regevalmot.UsuTecAsig",'left')
		->where(['regevalmot.IdReg' => $id])
		->get(1)
		->getRow();

		
		$d["resultado2"] = $this->model->db->table('regevalmot')
		->select('regevalmot.*, regpermot.*, sugregmot.*')
		->join('regpermot', 'regpermot.IdReg = regevalmot.IdReg', 'left')
		->join('sugregmot', 'sugregmot.IdReg = regevalmot.IdReg', 'left')
		->where(['regevalmot.IdReg' => $id])
		->get()
		->getResultArray();

		$b = false; //Desactivado?
		$d = array_merge($d,$this->getInp(["b"=>$b]));
		// JS
			array_push($d["js"],'https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js');
			array_push($d["js"],base_url('theme/src/assets/libs/select2/dist/js/select2.full.min.js'));
			array_push($d["js"],base_url('theme/src/assets/libs/select2/dist/js/select2.min.js'));
			array_push($d["js"],base_url('theme/dist/js/pages/forms/select2/select2.init.js'));
			array_push($d["js"], base_url('theme/src/assets/libs/jquery-validation/dist/jquery.validate.min.js')); //js para todos los forms
			array_push($d["js"], base_url('theme/src/assets/libs/jquery-validation/dist/additional-methods.js')); //js para todos los forms 
			array_push($d["js"], base_url('theme/src/assets/libs/moment/moment.js'));
			array_push($d["js"], base_url('resources/assets/js/bootstrap-datetimepicker.js'));
			array_push($d["js"], base_url("resources/assets/js/forms.js")); //js para todos los forms
			array_push($d["js"], base_url("theme/src/assets/libs/dropzone/dist/min/dropzone.min.js")); //js para todos los forms
		//CSS
			array_push($d["css"],base_url('theme/src/assets/libs/select2/dist/css/select2.min.css'));
			array_push($d["css"],base_url('theme/src/assets/libs/dropzone/dist/min/dropzone.min.css'));
			array_push($d["css"],'https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css');

		return view('manttomot/editar',$d);
	}
	public function getInp($a)
	{
		/*
			plu: Revisor
			id: id liq
			plgp: opciones grupo presupuesto
			b: editar?
		*/
		$d = [];
		$d["inpreg"] = [//Inputs Registro Motor
			// L1
			/*h ID*/ [ "class" => '', "wdth" => 0,"type" => 'input',"data" => ['type' => 'hidden', 'name' => 'IdReg', 'id' => 'IdReg'], ],
			/*Legend*/ [ "class" => 'col-md-12',"wdth" => 12,"type" => 'legend',"label" => 'Encabezado',],
			/*3 Técnico*/ [ "class" => 'col-md-3', "wdth" => 3, "type" => 'input', "label" => 'Técnico',"disabled" => true,"data" => ['type' => 'text','name' => 'NomUsuCre', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
			/*3 Modificado Por*/ [ "class" => 'col-md-3', "wdth" => 3, "type" => 'input', "label" => 'Modificado Por',"disabled" => true,"data" => ['type' => 'text','name' => 'NomUsuMod', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
			/*3 Supervisor*/ ["class" => 'col-md-3 mb-3',"wdth" => 3,"type" => 'select',"label" => 'Supervisor',"disabled" => $a["b"],
				"data" => ['name' => 'UsuSup',"id"=>"UsuSup", 'class' => 'form-control', "style" => "width: 100%;", "required" => "true"], //Opciones, si es un select, sino Otros atributos
				"options" => $this->model->getOptArray("usuarios","NomUsu","IdUsu",['IdTUsu'=>2],true), //Opciones, si es un select, sino Otros atributos
			],
			/*3 Fecha Efectuado*/ [ "class" => 'col-md-3', "wdth" => 3, "type" => 'input', "label" => 'Fecha Efectuado',"disabled" => $a["b"],'valid-feed' => "Correcto",'invalid-feed' => "Campo Obligatorio","data" => ['type' => 'date','name' => 'FecEfec', 'id' => 'FecEfec', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
			// L2
			/*Legend*/ [ "class" => 'col-md-12',"wdth" => 12,"type" => 'legend',"label" => 'Datos parada',],
			/*3 Nombre Parada*/ [ "class" => 'col-md-3', "wdth" => 3, "type" => 'input', "label" => 'Parada',"disabled" => true,"data" => ['type' => 'text','name' => 'NomPar','id' => 'NomPar', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
			/*9 Descripción Parada*/ [ "class" => 'col-md-9', "wdth" => 9, "type" => 'input', "label" => 'Descripción',"disabled" => true,"data" => ['type' => 'text','name' => 'DescPar','id' => 'DescPar', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
			// L2
			/*Legend*/ [ "class" => 'col-md-12',"wdth" => 12,"type" => 'legend',"label" => 'Datos Motor',],
			/*3 Nombre Motor*/ [ "class" => 'col-md-3', "wdth" => 3, "type" => 'input', "label" => 'Nombre',"disabled" => true,"data" => ['type' => 'text','name' => 'NomMot','id' => 'NomMot', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
			/*3 Tag Motor*/ [ "class" => 'col-md-3', "wdth" => 3, "type" => 'input', "label" => 'Tag',"disabled" => true,"data" => ['type' => 'text','name' => 'TagMot','id' => 'TagMot', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
			/*3 Marca Motor*/ [ "class" => 'col-md-3', "wdth" => 3, "type" => 'input', "label" => 'Marca',"disabled" => true,"data" => ['type' => 'text','name' => 'MarcaMot','id' => 'MarcaMot', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
			/*3 Serie Motor*/ [ "class" => 'col-md-3', "wdth" => 3, "type" => 'input', "label" => 'Serie',"disabled" => true,"data" => ['type' => 'text','name' => 'SerieMot','id' => 'SerieMot', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
			/*3 Potencia Motor*/ [ "class" => 'col-md-3', "wdth" => 3, "type" => 'input', "label" => 'Potencia',"disabled" => true,"data" => ['type' => 'text','name' => 'Potencia','id' => 'Potencia', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
			/*3 Tension Motor*/ [ "class" => 'col-md-3', "wdth" => 3, "type" => 'input', "label" => 'Tension',"disabled" => true,"data" => ['type' => 'text','name' => 'TensionMot','id' => 'TensionMot', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
			/*3 Corriente Motor*/ [ "class" => 'col-md-3', "wdth" => 3, "type" => 'input', "label" => 'Corriente',"disabled" => true,"data" => ['type' => 'text','name' => 'CorrienteMot','id' => 'CorrienteMot', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
			/*3 Velocidad Motor*/ [ "class" => 'col-md-3', "wdth" => 3, "type" => 'input', "label" => 'Velocidad',"disabled" => true,"data" => ['type' => 'text','name' => 'VelocidadMot','id' => 'VelocidadMot', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
		
			// /*4 Nro Liq*/ [ "class" => 'col-md-', "wdth" => 0, "type" => 'input', "label" => '',"disabled" => $a["b"],'valid-feed' => "Correcto",'invalid-feed' => "Campo Obligatorio","data" => ['type' => 'text','name' => '', 'id' => '', 'class' => 'form-control', /*'required' => 'true',*/ ], ],
			// /*4 Centro Costos*/ [ "class" => 'col-md-4 mb-4', "wdth" => 4, "type" => 'input', "label" => 'Centro de Costos', "disabled" => $a["b"], "data" => ['type' => 'text','name' => 'CcosLiq', 'id' => 'CcosLiq', 'class' => 'form-control', ], ],
		];
		$d["inpper"] = [//Inputs Perno
			[// ID
				"class" => '',
				"wdth" => 0, //Peso, si llega a 12 nuevo row
				"type" => 'input', //select, input, legend, check, button, text
				"data" => ['type' => 'hidden', 'name' => 'IdItem', 'id' => 'IdItem'], //Opciones, si es un select, sino Otros atributos
			],
			[// Fecha
				"class" => 'col-md-12 mb-3', //Clase del div que lo contiene
				"wdth" => 12, //Peso, si llega a 12 nuevo row
				"type" => 'input', //select, input, legend, check, button, text
				"disabled" => $a["b"],
				"data" => ['type' => 'date','name' => 'FechItem', 'id' => 'FechItem', 'class' => 'form-control', 'value' => date("Y-m-d"),], //Opciones, si es un select, sino Otros atributos
			],
			[//Legend Datos
				"class" => 'col-md-12', //Clase del div que lo contiene
				"wdth" => 12, //Peso, si llega a 12 nuevo row
				"type" => 'legend', //select, input, legend, check, button, text
				"label" => 'Datos',
			],
			[// Lugar
				"class" => 'col-md-6 mb-3', //Clase del div que lo contiene
				"wdth" => 6, //Peso, si llega a 12 nuevo row
				"type" => 'input', //select, input, legend, check, button, text
				"disabled" => $a["b"],
				"data" => ['type' => 'text','name' => 'LugarItem', 'id' => 'LugarItem', "placeholder" => "Lugar", 'class' => 'form-control',], //Opciones, si es un select, sino Otros atributos
			],
			[// Presupuesto
				"class" => 'col-md-6 mb-3', //Clase del div que lo contiene
				"wdth" => 3, //Peso, si llega a 12 nuevo row
				"type" => 'select', //select, input, legend, check, button, text
				"label" => 'Presupuesto',
				"disabled" => $a["b"],
				"data" => ['name' => 'IdPres',"id"=>"IdPres", 'class' => 'form-control', "style" => "width: 100%;", "required" => "true"], //Opciones, si es un select, sino Otros atributos
				"options" => ["" => "Seleccionar",], //Opciones, si es un select, sino Otros atributos
			],
			[// Observación
				"class" => 'col-md-12 mb-3', //Clase del div que lo contiene
				"wdth" => 12, //Peso, si llega a 12 nuevo row
				"type" => 'textarea', //select, input, legend, check, button, text
				"disabled" => $a["b"],
				"data" => ['type' => 'text', 'name' => 'ObsItem', 'id' => 'ObsItem', "placeholder" => "Observación", 'rows' => '3', 'class' => 'form-control',], //Opciones, si es un select, sino Otros atributos
			],
			[//Legend Costo
				"class" => 'col-md-12', //Clase del div que lo contiene
				"wdth" => 12, //Peso, si llega a 12 nuevo row
				"type" => 'legend', //select, input, legend, check, button, text
				"label" => 'Costos',
			],
			[// Soles
				"class" => 'col-md-6 mb-3', //Clase del div que lo contiene
				"wdth" => 6, //Peso, si llega a 12 nuevo row
				"type" => 'input', //select, input, legend, check, button, text
				"disabled" => $a["b"],
				"preigtext" => 'S/.',
				"data" => ['type' => 'number','name' => 'CostItem', 'id' => 'CostItem', "min" => "0", "max" => "1000", 'class' => 'form-control',], //Opciones, si es un select, sino Otros atributos
			],
		];
		return $d;
	}

	// AJAX
	// Paradas
	public function ajaxlpar() //Ajax lista Paradas
	{
		if(!session()->get("IdUsu")) return redirect()->to('/login');
		$idu = session()->get("IdUsu");
		$tusu = session()->get("IdTUsu");
		if($tusu == 1) //Técnico ve las Paradas que ha modificado
			$dt = $this->model->db->table('paradas')
				->select("*,ucre.NomUsu as NomUsuCre,usup.NomUsu as NomUsuSup")
				->join("usuarios ucre","ucre.IdUsu = paradas.UsuCre")
				->join("usuarios usup","usup.IdUsu = paradas.UsuSup","left")
				->orderBy('paradas.FecCre', 'DESC') 
				// ->where(["UsuCre" => $idu])
				->get()->getResultArray();
		else //Supervisor ve las paradas asignadas a él mismo
			$dt = $this->model->db->table('paradas')
				->select("*,ucre.NomUsu as NomUsuCre,usup.NomUsu as NomUsuSup")
				->join("usuarios ucre","ucre.IdUsu = paradas.UsuCre")
				->join("usuarios usup","usup.IdUsu = paradas.UsuSup","left")
				->orderBy('paradas.FecCre', 'DESC') 
				// ->where(["UsuSup" => $idu])
				->get()->getResultArray();
		return $this->setResponseFormat('json')->respond(["data" => $dt]);
	}
	public function ajaxedtpar() //Editar Paradas
	{
		$p = $this->request->getVar();
		try {
			$b = false;
			if(!isset($p["IdLiq"])) {
				unset($p["IdLiq"]);
				$p["IdTrab"] = session()->get("IdUsu");
				$p["FcreLiq"] = date("Y-m-d H:i");
				$b = $this->model->insert($p);
			}
			else{
				$id = $p["IdLiq"];
				unset($p["IdLiq"]);
				$b = $this->model->update($id,$p);
			}
			if($b) return $this->setResponseFormat('json')->respond(["m" => "Operación Correcta", "r"=>true, "q" => $this->model->db->getLastQuery()->getQuery()]);
			else return $this->setResponseFormat('json')->respond(["m" => "Datos erróneos", "r"=>true]);
		} catch (\Throwable $th) {
			return $this->setResponseFormat('json')->respond(["m" => "Puede que no haya conexión o que haya un error en el servidor", "r"=>false, "q" => $this->model->db->getLastQuery()->getQuery()]); //.$th->getMessage()." ".$this->model->getLastQuery()->getQuery()
		}
		return redirect()->to('/liqs');
	}
	public function ajaxdelpar() //Eliminar parada
	{
		$id = $this->request->getVar("id");
		try {
			$b = $this->model->db->table('regevalmot')->where(["IdReg" => $id])->update(["FecDel" => date('Y-m-d')]);
			if($b) return $this->setResponseFormat('json')->respond(["m" => "Liquidación eliminada", "r"=>true]);
			else return $this->setResponseFormat('json')->respond(["m" => "Error al guardar, si la liquidación tiene pagos o items no se puede eliminar", "r"=>false]);
			// session()->setFlashdata(['msg' => 'Operación correcta','r' => true]);
			// session()->setFlashdata(['msg' => 'Error al guardar, si la liquidación tiene pagos o items no se puede eliminar','r' => false]);
		} catch (\Throwable $th) {
			return $this->setResponseFormat('json')->respond(["m" => 'Error al eliminar, la liquidación tiene pagos o items', "msg" => $th->getMessage(),'r' => false]);
		}
	}
	// Registros
	public function ajaxlreg() //Ajax lista Registros
	{
		if(!session()->get("IdUsu")) return redirect()->to('/login');
		$idu = session()->get("IdUsu");
		$tusu = session()->get("IdTUsu");
		if($tusu == 1) //Técnico ve las Paradas que ha modificado
			$dt = $this->model->db->table('regevalmot')
				->select("*,ucre.NomUsu as NomUsuCre,usup.NomUsu as NomUsuSup")
				->join("usuarios ucre","ucre.IdUsu = regevalmot.UsuCre")
				->join("usuarios usup","usup.IdUsu = regevalmot.UsuSup","left")
				->join('motores', 'motores.IdMot = regevalmot.IdMot')
				->orderBy('regevalmot.FecEjec', 'DESC')
				// ->where(["UsuCre" => $idu])
				->get()->getResultArray();
		else //Supervisor ve los registros asignados a él mismo
			$dt = $this->model->db->table('regevalmot')
				->select("*,ucre.NomUsu as NomUsuCre,usup.NomUsu as NomUsuSup")
				->join("usuarios ucre","ucre.IdUsu = regevalmot.UsuCre")
				->join("usuarios usup","usup.IdUsu = regevalmot.UsuSup","left")
				->join('motores', 'motores.IdMot = regevalmot.IdMot')
				->orderBy('regevalmot.FecEjec', 'DESC')
				// ->where(["UsuSup" => $idu])
				->get()->getResultArray();
		return $this->setResponseFormat('json')->respond(["data" => $dt]);
	}
	public function ajaxedtreg() //Editar Registro Motor
	{
		$p = $this->request->getVar();
		try {
			$b = false;
			if(!isset($p["IdLiq"])) {
				unset($p["IdLiq"]);
				$p["IdTrab"] = session()->get("IdUsu");
				$p["FcreLiq"] = date("Y-m-d H:i");
				$b = $this->model->insert($p);
			}
			else{
				$id = $p["IdLiq"];
				unset($p["IdLiq"]);
				$b = $this->model->update($id,$p);
			}
			if($b) return $this->setResponseFormat('json')->respond(["m" => "Operación Correcta", "r"=>true, "q" => $this->model->db->getLastQuery()->getQuery()]);
			else return $this->setResponseFormat('json')->respond(["m" => "Datos erróneos", "r"=>true]);
		} catch (\Throwable $th) {
			return $this->setResponseFormat('json')->respond(["m" => "Puede que no haya conexión o que haya un error en el servidor", "r"=>false, "q" => $this->model->db->getLastQuery()->getQuery()]); //.$th->getMessage()." ".$this->model->getLastQuery()->getQuery()
		}
		return redirect()->to('/liqs');
	}
	public function ajaxdelreg() //Eliminar un Registro
	{
		$id = $this->request->getVar("id");
		try {
			$b = $this->model->db->table('regevalmot')->where(["IdReg" => $id])->update(["FecDel" => date('Y-m-d')]);
			if($b) return $this->setResponseFormat('json')->respond(["m" => "Liquidación eliminada", "r"=>true]);
			else return $this->setResponseFormat('json')->respond(["m" => "Error al guardar, si la liquidación tiene pagos o items no se puede eliminar", "r"=>false]);
			// session()->setFlashdata(['msg' => 'Operación correcta','r' => true]);
			// session()->setFlashdata(['msg' => 'Error al guardar, si la liquidación tiene pagos o items no se puede eliminar','r' => false]);
		} catch (\Throwable $th) {
			return $this->setResponseFormat('json')->respond(["m" => 'Error al eliminar, la liquidación tiene pagos o items', "msg" => $th->getMessage(),'r' => false]);
		}
	}

	// OTROS
	public function validar()
	{
		echo "<br><h2> Session </h2><br>";
		print_r(session()->get());
	}
	public function upload() //Subir imagen del item con id
	{
		var_dump($this->request->getFiles());
		$id = $this->request->getVar("id");
		$newName = '';
		if($imagefile = $this->request->getFiles()){
			foreach($imagefile as $img){
				if ($img->isValid() && ! $img->hasMoved()){
					$newName = $img->getRandomName();
					$this->model->db->table("itemfiles")
						->insert(
							[
								"IdItem"=>$id,
								"FcreItemf"=>date("Y-m-d H:i"),
								"UrlItemf"=>'uploads/items/'.$newName,
								"NameItemf" => $img->getName()
							]);
					$img->move(ROOTPATH.'public/uploads/items/', $newName);
				}
			}
		}
		$status = 1;
		return 'uploads/items/'.$newName;
	}
	public function delfile()
	{
		$id = $this->request->getVar("id");
		$fn = $this->request->getVar("name");
		// var_dump($id,$fn);
		try {
			$b = $this->model->db->table("itemfiles")->where(["IdItemf" => $id])->delete();
			if($b) {
				$s = unlink(str_replace("\\","/",ROOTPATH)."public/".$fn); # Arreglar url
				return $this->setResponseFormat('json')->respond(["m" => 'Archivo eliminado R:'.$s,'r' => true,'lq' => $this->model->db->getLastQuery()->getQuery()]);
			} 
			else return $this->setResponseFormat('json')->respond(["m" => 'Error al eliminar el archivo, puede que ya esté eliminado','r' => false]);
		} catch (\Throwable $th) {
			return $this->setResponseFormat('json')->respond(["m" => 'Puede que no haya conexión o que haya un error en el servidor E:'.$th->getMessage()." L>".$th->getLine(),'r' => false]);
		}

	}

	public function postParada()
    {
        // Obtener los datos enviados en la solicitud POST
        $datos = [
            'NomPar' => $this->request->getPost('NomPar'),
            'Estado' => $this->request->getPost('Estado'),
            'FecIni' => $this->request->getPost('FecIni'),
            'UsuCre' => $this->request->getPost('UsuCre'),
            'UsuSup' => $this->request->getPost('UsuSup'),
            'FecFin' => $this->request->getPost('FecFin'),
            'DescPar' => $this->request->getPost('DescPar'),
            'NomArea' => $this->request->getPost('NomArea')
        ];

		$this->model->db->table('paradas')->insert($datos);

        // Devolver una respuesta al cliente si es necesario
        $response = [
            'message' => 'Registro creado exitosamente',
            'data' => $datos
        ];

        return $this->response->setJSON($response);
    }
	
	// filtro para usuario 
	public function filtroUsuarios()
	{
		$query = $this->model->db->table('usuarios')->get()->getResult();
		return $this->response->setJSON($query);
	}

	public function filtroParadas()
	{
		$query = $this->model->db->table('paradas')->get()->getResult();
		return $this->response->setJSON($query);
	}

	public function autocomParda()
	{
		$idPar = $this->request->getVar('opcion');

		$query = $this->model->db->table('paradas');
		$query->where('IdPar',$idPar);

		$resultados = $query->get()->getResult();

		// Devolver los resultados como una respuesta JSON
		return $this->response->setJSON($resultados);
	}

	// Funcion para el filtrado para el 3er select 
	public function filtroSelect()
	{
		$dureza = $this->request->getVar('dureza');
		$tipo = $this->request->getVar('tipo');

		// Realizar la lógica de filtrado y obtener los resultados

		// Supongamos que obtenemos los resultados desde un modelo
		$query = $this->model->db->table('apriettornillos');
		$query->where('GradoDureza',$dureza);
		$query->where('Tipo',$tipo);

		$resultados = $query->get()->getResult();

		// Devolver los resultados como una respuesta JSON
		return $this->response->setJSON($resultados);
	}

	// Funcion para el autocompletado de los inputs de pernos 
	public function filtroInput()
	{
		$valor1 = $this->request->getVar('valor1');
		$valor2 = $this->request->getVar('valor2');
		$valor3 = $this->request->getVar('valor3');

		$valoresSeparados = explode(',', $valor3);
		$primerValor = $valoresSeparados[0]; // Accede al primer valor
		$segundoValor = $valoresSeparados[1]; // Accede al segundo valor

		// Realizar la lógica de filtrado y obtener los resultados

		// Supongamos que obtenemos los resultados desde un modelo
		$query = $this->model->db->table('apriettornillos');
		$query->where('GradoDureza',$valor1);
		$query->where('Tipo',$valor2);
		$query->where('DmPulgadas',$primerValor);
		$query->where('HilosXPulgada',$segundoValor);

		$resultados = $query->get()->getResult();

		// Devolver los resultados como una respuesta JSON
		return $this->response->setJSON($resultados);
	}

	// Formulario principal para la creacion del motor 
	public function ajaxPostMotor()
	{
		try {

			$image1 = $this->request->getFile('plcmotor');
			$image1_new_name = $image1->getRandomName();
			$image1->move(ROOTPATH . 'public/uploads/motores/', $image1_new_name);

			$image2 = $this->request->getFile('condini');
			$image2_new_name = $image2->getRandomName();
			$image2->move(ROOTPATH . 'public/uploads/motores/', $image2_new_name);

			$image3 = $this->request->getFile('con');
			$image3_new_name = $image3->getRandomName();
			$image3->move(ROOTPATH . 'public/uploads/motores/', $image3_new_name);

			$image4 = $this->request->getFile('finman');
			$image4_new_name = $image4->getRandomName();
			$image4->move(ROOTPATH . 'public/uploads/motores/', $image4_new_name);

			$image5 = $this->request->getFile('tag');
			$image5_new_name = $image5->getRandomName();
			$image5->move(ROOTPATH . 'public/uploads/motores/', $image5_new_name);

			$image6 = $this->request->getFile('congen');
			$image6_new_name = $image6->getRandomName();
			$image6->move(ROOTPATH . 'public/uploads/motores/', $image6_new_name);

			$image7 = $this->request->getFile('conex');
			$image7_new_name = $image7->getRandomName();
			$image7->move(ROOTPATH . 'public/uploads/motores/', $image7_new_name);

			$image8 = $this->request->getFile('finmant');
			$image8_new_name = $image8->getRandomName();
			$image8->move(ROOTPATH . 'public/uploads/motores/', $image8_new_name);

			// Crea una nueva entrada en la base de datos
			$dataMotor = [
				'NomMot' => $this->request->getPost('NomMot'),
				'TagMot' => $this->request->getPost('TagMot'),
				'MarcaMot' => $this->request->getPost('MarcaMot'),
				'SerieMot' => $this->request->getPost('SerieMot'),
				'PotenciaMot' => $this->request->getPost('PotenciaMot'),
				'TensionMot' => $this->request->getPost('TensionMot'),
				'CorrienteMot' => $this->request->getPost('CorrienteMot'),
				'VelocidadMot' => $this->request->getPost('VelocidadMot'),

				'modelMot' => $this->request->getPost('modelMot'),
				'frameMot' => $this->request->getPost('frameMot'),
				'fsMot' => $this->request->getPost('fsMot'),
				'hzMot' => $this->request->getPost('hzMot'),

				'UsuCre' => $this->request->getPost('UsuCre'),
				'MEL' => $this->request->getPost('MEL'),

				// IMAGENES
				'image1_path' => 'uploads/motores/' . $image1_new_name,
				'image1_name' => $image1_new_name,
				
				'image2_path' => 'uploads/motores/' . $image2_new_name,
				'image2_name' => $image2_new_name,

				'image3_path' => 'uploads/motores/' . $image3_new_name,
				'image3_name' => $image3_new_name,

				'image4_path' => 'uploads/motores/' . $image4_new_name,
				'image4_name' => $image4_new_name,

				'image5_path' => 'uploads/motores/' . $image5_new_name,
				'image5_name' => $image5_new_name,

				'image6_path' => 'uploads/motores/' . $image6_new_name,
				'image6_name' => $image6_new_name,

				'image7_path' => 'uploads/motores/' . $image7_new_name,
				'image7_name' => $image7_new_name,

				'image8_path' => 'uploads/motores/' . $image8_new_name,
				'image8_name' => $image8_new_name,
			];
		
			// Inserta los datos en la tabla motor y obtén el ID del motor creado
			$this->model->db->table('motores')->insert($dataMotor);
			$motorId = $this->model->db->insertID();
		
			// Verifica si el ID del motor se obtuvo correctamente
			if ($motorId) {
				$dataEncabezado = [
					'UsuCre' => $this->request->getPost('UsuCre'),
					'UsuSup' => $this->request->getPost('UsuSup'),
					'FecEjec' => $this->request->getPost('FecEjec'),
					'IdPar' => $this->request->getPost('IdPar'),
					'HabPruResTieReg' => $this->request->getPost('HabPruResTieReg') ? 1 : 0,
					'HabPruResOhmReg' => $this->request->getPost('HabPruResOhmReg') ? 1 : 0,
					'HabTorqueReg' => $this->request->getPost('HabTorqueReg') ? 1 : 0,

					'trabR1' => $this->request->getPost('trabR1') ? 1 : 0,
					'trabR2' => $this->request->getPost('trabR2') ? 1 : 0,
					'trabR3' => $this->request->getPost('trabR3') ? 1 : 0,
					'trabR4' => $this->request->getPost('trabR4') ? 1 : 0,
					'trabR5' => $this->request->getPost('trabR5') ? 1 : 0,
					'trabR6' => $this->request->getPost('trabR6') ? 1 : 0,
					'trabR7' => $this->request->getPost('trabR7') ? 1 : 0,
					'trabR8' => $this->request->getPost('trabR8') ? 1 : 0,
					'trabR9' => $this->request->getPost('trabR9') ? 1 : 0,
					'trabR10' => $this->request->getPost('trabR10') ? 1 : 0,
					'trabR11' => $this->request->getPost('trabR11') ? 1 : 0,
					'trabR12' => $this->request->getPost('trabR12') ? 1 : 0,
					'tecsEval' => $this->request->getPost('tecsEval'),
					'IdMot' => $motorId
				];

				// Procesa cada imagen por separado
				for ($i = 1; $i <= 4; $i++) {
					$fieldName = 'imagen' . $i;
					$file = $this->request->getFile($fieldName);

					// Verifica si la nueva imagen es válida y no se ha movido
					if ($file->isValid() && !$file->hasMoved()) {
						$newName = $file->getRandomName();
						$file->move(ROOTPATH . 'public/uploads/anexos/', $newName);

						// Elimina la imagen anterior si existe
						if (!empty($dataEncabezado['img' . $i . '_name'])) {
							$oldImagePath = ROOTPATH . 'public/uploads/anexos/' . $dataEncabezado['img' . $i . '_name'];
							if (file_exists($oldImagePath)) {
								unlink($oldImagePath);
							}
						}

						// Actualiza los datos de la nueva imagen
						$dataEncabezado['img' . $i . '_path'] = 'uploads/anexos/' . $newName;
						$dataEncabezado['img' . $i . '_name'] = $newName;
					}else{
						$dataEncabezado['img' . $i . '_path'] = null;
						$dataEncabezado['img' . $i . '_name'] = null;
					}
				}
		
				// Inserta los datos en la tabla encabezado
				$this->model->db->table('regevalmot')->insert($dataEncabezado);
				$registerId = $this->model->db->insertID();

				if($registerId){
					$habPruResTieReg = $this->request->getPost('HabPruResTieReg') == 1;
					$habPruResOhmReg = $this->request->getPost('HabPruResOhmReg') == 1;
					$habTorqueReg = $this->request->getPost('HabTorqueReg') == 1;
					
					$data1 = [
						'IdReg' => $registerId,
						'MegMegaReg' => $this->request->getPost('MegMegaReg'),
						'MegSerieReg' => $this->request->getPost('MegSerieReg'),
						'MegTiPruReg' => $this->request->getPost('MegTiPruReg'),
						'MegTpruReg' => $this->request->getPost('MegTpruReg'),
						'MegTambReg' => $this->request->getPost('MegTambReg'),
						'MPru30sLectReg' => $this->request->getPost('MPru30sLectReg'),
						'MPru30sIndReg' => $this->request->getPost('MPru30sIndReg'),
						'MPru30sObsReg' => $this->request->getPost('MPru30sObsReg'),
						'MPru60sLectReg' => $this->request->getPost('MPru60sLectReg'),
						'MPru60sIndReg' => $this->request->getPost('MPru60sIndReg'),
						'MPru60sObsReg' => $this->request->getPost('MPru60sObsReg'),

						'MPru2mLectReg' => $this->request->getPost('MPru2mLectReg'),
						'MPru2mIndReg' => $this->request->getPost('MPru2mIndReg'),
						'MPru2mObsReg' => $this->request->getPost('MPru2mObsReg'),

						'MPru3mLectReg' => $this->request->getPost('MPru3mLectReg'),
						'MPru3mIndReg' => $this->request->getPost('MPru3mIndReg'),
						'MPru3mObsReg' => $this->request->getPost('MPru3mObsReg'),

						'MPru4mLectReg' => $this->request->getPost('MPru4mLectReg'),
						'MPru4mIndReg' => $this->request->getPost('MPru4mIndReg'),
						'MPru4mObsReg' => $this->request->getPost('MPru4mObsReg'),

						'MPru5mLectReg' => $this->request->getPost('MPru5mLectReg'),
						'MPru5mIndReg' => $this->request->getPost('MPru5mIndReg'),
						'MPru5mObsReg' => $this->request->getPost('MPru5mObsReg'),

						'MPru6mLectReg' => $this->request->getPost('MPru6mLectReg'),
						'MPru6mIndReg' => $this->request->getPost('MPru6mIndReg'),
						'MPru6mObsReg' => $this->request->getPost('MPru6mObsReg'),

						'MPru7mLectReg' => $this->request->getPost('MPru7mLectReg'),
						'MPru7mIndReg' => $this->request->getPost('MPru7mIndReg'),
						'MPru7mObsReg' => $this->request->getPost('MPru7mObsReg'),

						'MPru8mLectReg' => $this->request->getPost('MPru8mLectReg'),
						'MPru8mIndReg' => $this->request->getPost('MPru8mIndReg'),
						'MPru8mObsReg' => $this->request->getPost('MPru8mObsReg'),

						'MPru9mLectReg' => $this->request->getPost('MPru9mLectReg'),
						'MPru9mIndReg' => $this->request->getPost('MPru9mIndReg'),
						'MPru9mObsReg' => $this->request->getPost('MPru9mObsReg'),

						'MPru10mLectReg' => $this->request->getPost('MPru10mLectReg'),
						'MPru10mIndReg' => $this->request->getPost('MPru10mIndReg'),
						'MPru10mObsReg' => $this->request->getPost('MPru10mObsReg'),
					];

					$data2 = [
						'IdReg' => $registerId,
						'MicMetReg' => $this->request->getPost('MicMetReg'),
						'MicCertCalReg' => $this->request->getPost('MicCertCalReg'),
						'MicTempAmbReg' => $this->request->getPost('MicTempAmbReg'),
						'MicConPruReg' => $this->request->getPost('MicConPruReg'),
						'MicLec12Reg' => $this->request->getPost('MicLec12Reg'),
						'MicLec23Reg' => $this->request->getPost('MicLec23Reg'),
						'MicLec31Reg' => $this->request->getPost('MicLec31Reg'),
						'MicObs12Reg' => $this->request->getPost('MicObs12Reg'),
						'MicDes12Reg' => $this->request->getPost('MicDes12Reg'),
						'MicDes23Reg' => $this->request->getPost('MicDes23Reg'),
						'MicDes31Reg' => $this->request->getPost('MicDes31Reg'),
						'MicRes12Reg' => $this->request->getPost('MicRes12Reg'),
						'MicObs23Reg' => $this->request->getPost('MicObs23Reg'),
						'MicObs31Reg' => $this->request->getPost('MicObs31Reg'),
					];

					$data3 = [
						'IdReg' => $registerId,
						'NroPer' => $this->request->getPost('NroPer'),
						'GDuPer' => $this->request->getPost('GDuPer'),
						'TipPer' => $this->request->getPost('TipPer'),
						'DiaPulper' => $this->request->getPost('DiaPulper'),
						// 'requerido' => $this->request->getPost('requerido'),
						'TorMedPer' => $this->request->getPost('TorMedPer'),
						// 'unidad' => $this->request->getPost('unidad'),
						'FecPer' => $this->request->getPost('FecPer'),
						'ObsPer' => $this->request->getPost('ObsPer'),
						// 'LlaveRangoReg' => $this->request->getPost('LlaveRangoReg'),
						// 'LlaveMarcaReg' => $this->request->getPost('LlaveMarcaReg'),
						// 'LlaveNroCertReg' => $this->request->getPost('LlaveNroCertReg'),
						// 'LlaveNroSerieReg' => $this->request->getPost('LlaveNroSerieReg'),
						// Agrega más campos según sea necesario
					];

					if ($habPruResTieReg) {
						$insertions[] = ['table' => 'regmegmot', 'data' => $data1];
					}
					if ($habPruResOhmReg) {
						$insertions[] = ['table' => 'regmicmot', 'data' => $data2];
					}
					if ($habTorqueReg) {
						$insertions[] = ['table' => 'regpermot', 'data' => $data3];
					}
	
					foreach ($insertions as $insertion) {
						$this->model->db->table($insertion['table'])->insert($insertion['data']);
					}
				}

				if($registerId){
					$TextoSug = $this->request->getPost('TextoSug');
					$CritiSug = $this->request->getPost('CritiSug');
					$AvisoSug = $this->request->getPost('aviso');
					$OTSug = $this->request->getPost('ot');
					$EstadoSug = $this->request->getPost('estado');

					if ($TextoSug && $CritiSug && count($TextoSug) === count($CritiSug)) {

						$datosInsertar = [];
						for ($i = 0; $i < count($TextoSug); $i++) {
							$inputValor = $TextoSug[$i];
							$selectValor = $CritiSug[$i];
							$avisoValor = $AvisoSug[$i];
							$otValor = $OTSug[$i];
							$estadoValor = $EstadoSug[$i];
							
							$registro = [
								'IdReg' => $registerId,
								'TextoSug' => $inputValor,
								'CritiSug' => $selectValor,
								'aviso' => $avisoValor,
								'ot' => $otValor,
								'estado' => $estadoValor,
								'IdTec' => $this->request->getPost('UsuCre'),
							];
							
							// Agregar el registro al arreglo de datos a insertar
							$datosInsertar[] = $registro;
						}
						$this->model->db->table('sugregmot')->insertBatch($datosInsertar);
						return $this->response->setJSON(['success' => true, 'message' => 'Datos insertados correctamente']);
					}
				}
							
				// Ejemplo de retorno de una respuesta JSON al cliente
				$response = [
					'status' => 'success',
					'message' => 'Datos del formulario recibidos y guardados en la base de datos correctamente'
				];
		
				return $this->response->setJSON($response);
			} else {
				// Si no se pudo obtener el ID del motor, puedes manejar el error o retornar una respuesta de error al cliente
				$response = [
					'status' => 'error',
					'message' => 'Error al crear el motor en la base de datos'
				];
		
				return $this->response->setJSON($response);
			}
		} catch (\Exception $e) {
			// Captura la excepción y muestra el mensaje de error
			$response = [
				'status' => 'error',
				'message' => $e->getMessage()
			];

			return $this->response->setJSON($response);
    	}
	}

	public function ajaxUpdateMotor()
	{
		try {
			// Obtén el ID del registro a actualizar
			$idReg = $this->request->getPost('IdReg');
			$IdMot = $this->request->getPost('IdMot');
			$IdRegMeg = $this->request->getPost('IdRegMeg');
			$IdRegMic = $this->request->getPost('IdRegMic');
	
			// Verifica si el ID del registro se obtuvo correctamente
			if (!$idReg) {
				$response = [
					'status' => 'error',
					'message' => 'Error: ID del registro no válido'
				];
	
				return $this->response->setJSON($response);
			}

			// Inicia una transacción
			$this->model->db->transBegin();

			// Actualiza los datos en la tabla motor
			$dataMotor = [
				'NomMot' => $this->request->getPost('NomMot'),
				'TagMot' => $this->request->getPost('TagMot'),
				'MarcaMot' => $this->request->getPost('MarcaMot'),
				'SerieMot' => $this->request->getPost('SerieMot'),
				'PotenciaMot' => $this->request->getPost('PotenciaMot'),
				'TensionMot' => $this->request->getPost('TensionMot'),
				'CorrienteMot' => $this->request->getPost('CorrienteMot'),
				'VelocidadMot' => $this->request->getPost('VelocidadMot'),
				'modelMot' => $this->request->getPost('modelMot'),
				'frameMot' => $this->request->getPost('frameMot'),
				'fsMot' => $this->request->getPost('fsMot'),
				'hzMot' => $this->request->getPost('hzMot'),
				'UsuCre' => $this->request->getPost('UsuCre'),
				'MEL' => $this->request->getPost('MEL'),
				'diasInter' => $this->request->getPost('diasInter'),
				
			];

			// Procesa cada imagen por separado
			for ($i = 1; $i <= 8; $i++) {
				$fieldName = 'image' . $i;
				$file = $this->request->getFile($fieldName);

				// Verifica si la nueva imagen es válida y no se ha movido
				if ($file->isValid() && !$file->hasMoved()) {
					$newName = $file->getRandomName();
					$file->move(ROOTPATH . 'public/uploads/motores/', $newName);

					// Elimina la imagen anterior si existe
					if (!empty($dataMotor['image' . $i . '_name'])) {
						$oldImagePath = ROOTPATH . 'public/uploads/motores/' . $dataMotor['image' . $i . '_name'];
						if (file_exists($oldImagePath)) {
							unlink($oldImagePath);
						}
					}

					// Actualiza los datos de la nueva imagen
					$dataMotor['image' . $i . '_path'] = 'uploads/motores/' . $newName;
					$dataMotor['image' . $i . '_name'] = $newName;
				}
			}

			$this->model->db->table('motores')->where('IdMot', $IdMot)->update($dataMotor);
	
			// Actualiza los datos en la tabla regevalmot
			$dataEncabezado = [
				'UsuCre' => $this->request->getPost('UsuCre'),
				'UsuSup' => $this->request->getPost('UsuSup'),
				'FecEjec' => $this->request->getPost('FecEjec'),
				'IdPar' => $this->request->getPost('IdPar'),
				'HabPruResTieReg' => $this->request->getPost('HabPruResTieReg') == 1 ? 1 : 0,
				'HabPruResOhmReg' => $this->request->getPost('HabPruResOhmReg') == 1 ? 1 : 0,
				'HabTorqueReg' => $this->request->getPost('HabTorqueReg') == 1 ? 1 : 0,

				'trabR1' => $this->request->getPost('trabR1') ? 1 : 0,
				'trabR2' => $this->request->getPost('trabR2') ? 1 : 0,
				'trabR3' => $this->request->getPost('trabR3') ? 1 : 0,
				'trabR4' => $this->request->getPost('trabR4') ? 1 : 0,
				'trabR5' => $this->request->getPost('trabR5') ? 1 : 0,
				'trabR6' => $this->request->getPost('trabR6') ? 1 : 0,
				'trabR7' => $this->request->getPost('trabR7') ? 1 : 0,
				'trabR8' => $this->request->getPost('trabR8') ? 1 : 0,
				'trabR9' => $this->request->getPost('trabR9') ? 1 : 0,
				'trabR10' => $this->request->getPost('trabR10') ? 1 : 0,
				'trabR11' => $this->request->getPost('trabR11') ? 1 : 0,
				'trabR12' => $this->request->getPost('trabR12') ? 1 : 0,
				'tecsEval' => $this->request->getPost('tecsEval'),


				'IdMot' => $IdMot
				// Agrega más campos según sea necesario para actualizar en la tabla regevalmot
			];

			// Procesa cada imagen por separado
			for ($i = 1; $i <= 4; $i++) {
				$fieldName = 'imagen' . $i;
				$file = $this->request->getFile($fieldName);

				// Verifica si la nueva imagen es válida y no se ha movido
				if ($file->isValid() && !$file->hasMoved()) {
					$newName = $file->getRandomName();
					$file->move(ROOTPATH . 'public/uploads/anexos/', $newName);

					// Elimina la imagen anterior si existe
					if (!empty($dataEncabezado['img' . $i . '_name'])) {
						$oldImagePath = ROOTPATH . 'public/uploads/anexos/' . $dataEncabezado['img' . $i . '_name'];
						if (file_exists($oldImagePath)) {
							unlink($oldImagePath);
						}
					}

					// Actualiza los datos de la nueva imagen
					$dataEncabezado['img' . $i . '_path'] = 'uploads/anexos/' . $newName;
					$dataEncabezado['img' . $i . '_name'] = $newName;
				}
			}
	
			$this->model->db->table('regevalmot')->where('IdReg', $idReg)->update($dataEncabezado);
	
			// Verifica si se actualizaron los datos correctamente en las tablas motor y regevalmot
			// if ($this->model->db->affectedRows() > 0) {
			$habPruResTieReg = $this->request->getPost('HabPruResTieReg') == 1;
			$habPruResOhmReg = $this->request->getPost('HabPruResOhmReg') == 1;
			$habTorqueReg = $this->request->getPost('HabTorqueReg') == 1;
	
			// Actualiza los datos en la tabla regmegmot
			if ($habPruResTieReg) {
				$data1 = [
					'IdReg' => $idReg,
					'MegMegaReg' => $this->request->getPost('MegMegaReg'),
					'MegSerieReg' => $this->request->getPost('MegSerieReg'),
					'MegTiPruReg' => $this->request->getPost('MegTiPruReg'),
					'MegTpruReg' => $this->request->getPost('MegTpruReg'),
					'MegTambReg' => $this->request->getPost('MegTambReg'),
					'MPru30sLectReg' => $this->request->getPost('MPru30sLectReg'),
					'MPru30sIndReg' => $this->request->getPost('MPru30sIndReg'),
					'MPru30sObsReg' => $this->request->getPost('MPru30sObsReg'),
					'MPru60sLectReg' => $this->request->getPost('MPru60sLectReg'),
					'MPru60sIndReg' => $this->request->getPost('MPru60sIndReg'),
					'MPru60sObsReg' => $this->request->getPost('MPru60sObsReg'),
					'MPru10mLectReg' => $this->request->getPost('MPru10mLectReg'),
					'MPru10mIndReg' => $this->request->getPost('MPru10mIndReg'),
					'MPru10mObsReg' => $this->request->getPost('MPru10mObsReg')
				];
	
				// Verifica si existe el registro en la tabla regmegmot
				if ($this->model->db->table('regmegmot')->where('IdRegMeg', $IdRegMeg)->countAllResults() > 0) {
					$this->model->db->table('regmegmot')->where('IdRegMeg', $IdRegMeg)->update($data1);
				} else {
					$this->model->db->table('regmegmot')->insert($data1);
				}
			}
	
			// Actualiza los datos en la tabla regmicmot
			if ($habPruResOhmReg) {
				$data2 = [
					'IdReg' => $idReg,
					'MicMetReg' => $this->request->getPost('MicMetReg'),
					'MicCertCalReg' => $this->request->getPost('MicCertCalReg'),
					'MicTempAmbReg' => $this->request->getPost('MicTempAmbReg'),
					'MicConPruReg' => $this->request->getPost('MicConPruReg'),
					'MicLec12Reg' => $this->request->getPost('MicLec12Reg'),
					'MicLec23Reg' => $this->request->getPost('MicLec23Reg'),
					'MicLec31Reg' => $this->request->getPost('MicLec31Reg'),
					'MicObs12Reg' => $this->request->getPost('MicObs12Reg'),
					'MicDes12Reg' => $this->request->getPost('MicDes12Reg'),
					'MicDes23Reg' => $this->request->getPost('MicDes23Reg'),
					'MicDes31Reg' => $this->request->getPost('MicDes31Reg'),
					'MicRes12Reg' => $this->request->getPost('MicRes12Reg'),
					'MicObs23Reg' => $this->request->getPost('MicObs23Reg'),
					'MicObs31Reg' => $this->request->getPost('MicObs31Reg')
				];
	
				// Verifica si existe el registro en la tabla regmicmot
				if ($this->model->db->table('regmicmot')->where('IdRegMic', $IdRegMic)->countAllResults() > 0) {
					$this->model->db->table('regmicmot')->where('IdRegMic', $IdRegMic)->update($data2);
				} else {
					$this->model->db->table('regmicmot')->insert($data2);
				}
			}
	
			// Actualiza los datos en la tabla regpermot
			if ($habTorqueReg) {
				$data3 = [
					'IdReg' => $idReg,
					'NroPer' => $this->request->getPost('NroPer'),
					'GDurPer' => $this->request->getPost('GDurPer'),
					'TipPer' => $this->request->getPost('TipPer'),
					'DiaPulper' => $this->request->getPost('DiaPulper'),
					'TorMedPer' => $this->request->getPost('TorMedPer'),
					'FecPer' => $this->request->getPost('FecPer'),
					'ObsPer' => $this->request->getPost('ObsPer')
				];
	
				// Verifica si existe el registro en la tabla regpermot
				if ($this->model->db->table('regpermot')->where('IdReg', $idReg)->countAllResults() > 0) {
					$this->model->db->table('regpermot')->where('IdReg', $idReg)->update($data3);
				} else {
					$this->model->db->table('regpermot')->insert($data3);
				}
			}
	
			// Actualiza los datos en la tabla sugregmot
			$TextoSug = $this->request->getPost('TextoSug');
			$CritiSug = $this->request->getPost('CritiSug');
			$AvisoSug = $this->request->getPost('aviso');
			$OTSug = $this->request->getPost('ot');
			$EstadoSug = $this->request->getPost('estado');
	
			if ($TextoSug && $CritiSug && count($TextoSug) === count($CritiSug)) {
				// Elimina los registros existentes en la tabla sugregmot para el registro actual
				$this->model->db->table('sugregmot')->where('IdReg', $idReg)->delete();
	
				// Preparar los datos para la inserción
				$datosInsertar = [];
				for ($i = 0; $i < count($TextoSug); $i++) {
					$inputValor = $TextoSug[$i];
					$selectValor = $CritiSug[$i];
					$avisoValor = $AvisoSug[$i];
					$otValor = $OTSug[$i];
					$estadoValor = $EstadoSug[$i];
	
					// Crear un arreglo asociativo con los datos del registro
					$registro = [
						'IdReg' => $idReg,
						'TextoSug' => $inputValor,
						'CritiSug' => $selectValor,
						'aviso' => $avisoValor,
						'ot' => $otValor,
						'estado' => $estadoValor,
						'IdTec' => $this->request->getPost('UsuCre')
						// Agrega aquí los demás campos y sus valores correspondientes
					];
	
					// Agregar el registro al arreglo de datos a insertar
					$datosInsertar[] = $registro;
				}
	
				// Inserta los datos en la tabla sugregmot
				$this->model->db->table('sugregmot')->insertBatch($datosInsertar);
			}
	
			// Confirma la transacción
			$this->model->db->transCommit();
	
			// Ejemplo de retorno de una respuesta JSON al cliente
			$response = [
				'status' => 'success',
				'message' => 'Datos actualizados correctamente'
			];
	
			return $this->response->setJSON($response);
		} catch (\Exception $e) {
			$response = [
				'status' => 'error',
				'message' => $e->getMessage()
			];

			return $this->response->setJSON($response);
		}
	}

	public function ajaxNewMot()
	{
		$response = $this->model->db->table('motores')
			->select("*")
			->where("NomMot", '')
			->orWhere("NomMot IS NULL")
			->get()
			->getResultArray();
		return $this->response->setJSON($response);
	}

	public function ajaxNotification()
	{
		$usu = session()->get("IdUsu");
		$response = $this->model->db->table('notif')
			->select("*")
			->join("usuarios ucre","ucre.IdUsu = notif.IdUsu")
			->where("notif.IdUsu", $usu)
			->get()
			->getResultArray();
		return $this->response->setJSON($response);

	}

	// FUNCIONES PARA EL TECNICO
	public function dashTec()
	{
		if(!session()->get("IdUsu")) return redirect()->to('/login');
		$d = $this->data;
		// JS
			array_push($d["js"],'https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js');
			array_push($d["js"],base_url('theme/src/assets/libs/select2/dist/js/select2.full.min.js'));
			array_push($d["js"],base_url('theme/src/assets/libs/select2/dist/js/select2.min.js'));
			array_push($d["js"],base_url('theme/dist/js/pages/forms/select2/select2.init.js'));
			array_push($d["js"], base_url('theme/src/assets/libs/jquery-validation/dist/jquery.validate.min.js')); //js para todos los forms
			array_push($d["js"], base_url('theme/src/assets/libs/jquery-validation/dist/additional-methods.js')); //js para todos los forms 
			array_push($d["js"], base_url('resources/assets/js/bootstrap-datetimepicker.js'));
			array_push($d["js"], base_url("resources/assets/js/forms.js")); //js para todos los forms
			array_push($d["js"], base_url("theme/src/assets/libs/dropzone/dist/min/dropzone.min.js")); //js para todos los forms
		//CSS
			array_push($d["css"],base_url('theme/src/assets/libs/select2/dist/css/select2.min.css'));
			array_push($d["css"],base_url('theme/src/assets/libs/dropzone/dist/min/dropzone.min.css'));
			array_push($d["css"],'https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css');

		return view('manttomot/tecnico/dashTec',$d);
	}

	public function ajaxAsig()
	{
		$usu = session()->get("IdUsu");
		$response = $this->model->db->table('regevalmot')
					->select("*,regevalmot.IdReg, GROUP_CONCAT(sugregmot.TextoSug) as 'datos_concatenados', GROUP_CONCAT(sugregmot.ot) as 'OT',GROUP_CONCAT(sugregmot.aviso) as 'avisos'")
					->join('paradas', 'paradas.IdPar = regevalmot.IdPar','left')
					->join('motores', 'motores.IdMot = regevalmot.IdMot','left')
					->join('sugregmot', 'sugregmot.IdReg = regevalmot.IdReg','left')
					->where('regevalmot.IdPar', 24)
					// ->where('regevalmot.UsuTecAsig', $usu)
					// ->orWhere('regevalmot.UsuSup', $usu)
					->groupBy('regevalmot.IdReg')
					->get()
					->getResultArray();
		return $this->response->setJSON($response);
	}

	// FUNCIONES PARA EL PLANNER
	public function dashPlanner()
	{
		if(!session()->get("IdUsu")) return redirect()->to('/login');
		$d = $this->data;

		$d["data"] = $this->model->db->table('regevalmot')
				->select("*, GROUP_CONCAT(sugregmot.TextoSug) as 'datos_concatenados', GROUP_CONCAT(sugregmot.ot) as 'OT',GROUP_CONCAT(sugregmot.aviso) as 'avisos'")
				->join('paradas', 'paradas.IdPar = regevalmot.IdPar','left')
				->join('motores', 'motores.IdMot = regevalmot.IdMot','left')
				->join('regmegmot', 'regmegmot.IdReg = regevalmot.IdReg','left')
				->join('sugregmot', 'sugregmot.IdReg = regevalmot.IdReg','left')
				->where('regevalmot.EstReg !=', 3) 
				->groupBy('regevalmot.IdReg') // Agrupar por IdReg
				->get()
				->getResultArray();

		$d["data2"] = $this->model->db->table('regevalmot')
				->select("*, GROUP_CONCAT(sugregmot.TextoSug) as 'datos_concatenados', GROUP_CONCAT(sugregmot.ot) as 'OT',GROUP_CONCAT(sugregmot.aviso) as 'avisos'")
				->join('paradas', 'paradas.IdPar = regevalmot.IdPar')
				->join('motores', 'motores.IdMot = regevalmot.IdMot')
				->join('regmegmot', 'regmegmot.IdReg = regevalmot.IdReg')
				->join('sugregmot', 'sugregmot.IdReg = regevalmot.IdReg')
				// ->where('regevalmot.EstReg !=', 3) 
				->groupBy('regevalmot.IdReg') // Agrupar por IdReg
				->limit(8) 
				->get()
				->getResultArray();

		$d["data3"] = $this->model->db->table('regevalmot')
				->select("*, GROUP_CONCAT(sugregmot.TextoSug) as 'datos_concatenados', GROUP_CONCAT(sugregmot.ot) as 'OT',GROUP_CONCAT(sugregmot.aviso) as 'avisos'")
				->join('paradas', 'paradas.IdPar = regevalmot.IdPar','left')
				->join('motores', 'motores.IdMot = regevalmot.IdMot','left')
				->join('regmegmot', 'regmegmot.IdReg = regevalmot.IdReg','left')
				->join('sugregmot', 'sugregmot.IdReg = regevalmot.IdReg','left')
				// ->where('regevalmot.EstReg !=', 3) 
				->groupBy('regevalmot.IdReg') // Agrupar por IdReg
				->get()
				->getResultArray();
		// JS
			array_push($d["js"],'https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js');
			array_push($d["js"],base_url('theme/src/assets/libs/select2/dist/js/select2.full.min.js'));
			array_push($d["js"],base_url('theme/src/assets/libs/select2/dist/js/select2.min.js'));
			array_push($d["js"],base_url('theme/dist/js/pages/forms/select2/select2.init.js'));
			array_push($d["js"], base_url('theme/src/assets/libs/jquery-validation/dist/jquery.validate.min.js')); //js para todos los forms
			array_push($d["js"], base_url('theme/src/assets/libs/jquery-validation/dist/additional-methods.js')); //js para todos los forms 
			array_push($d["js"], base_url('resources/assets/js/bootstrap-datetimepicker.js'));
			array_push($d["js"], base_url("resources/assets/js/forms.js")); //js para todos los forms
			array_push($d["js"], base_url("theme/src/assets/libs/dropzone/dist/min/dropzone.min.js")); //js para todos los forms
		//CSS
			array_push($d["css"],base_url('theme/src/assets/libs/select2/dist/css/select2.min.css'));
			array_push($d["css"],base_url('theme/src/assets/libs/dropzone/dist/min/dropzone.min.css'));
			array_push($d["css"],'https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css');

		return view('manttomot/planner/dashPlanner',$d);
	}

	public function ajaxMantMot()
	{
		$response = $this->model->db->table('planMant')
			->select("*")
			->join('motores', 'motores.IdMot = planMant.IdMot','left')
			// ->join('sugregmot', 'sugregmot.IdReg = regevalmot.IdReg','left')
			// ->where('regevalmot.UsuTecAsig', $usu) 
			// ->groupBy('regevalmot.IdReg')
			->get()
			->getResultArray();
		return $this->response->setJSON($response);
	}

	public function ajaxPostNewMotor()
	{
		// Obtener los datos enviados en la solicitud POST
		$datos = [
			'MarcaMot' => $this->request->getPost('MarcaMot'),
			'CorrienteMot' => $this->request->getPost('CorrienteMot'),
			'SerieMot' => $this->request->getPost('SerieMot'),
			'VelocidadMot' => $this->request->getPost('VelocidadMot'),
			'PotenciaMot' => $this->request->getPost('potenciaMotor'),
			'modelMot' => $this->request->getPost('modelMot'),
			'TensionMot' => $this->request->getPost('TensionMot'),
			'hzMot' => $this->request->getPost('hzMot'),
			'fsMot' => $this->request->getPost('fsMot')
		];

		$this->model->db->table('motores')->insert($datos);
		$motorId = $this->model->db->insertID();

		$dataEncabezado = [
			'UsuCre' => $this->request->getPost('UsuCre'),
			'IdMot' => $motorId
		];

		$response = $this->model->db->table('regevalmot')->insert($dataEncabezado);
		return $this->response->setJSON($response);

	}

	public function ajaxUpdateNewMot()
	{
		$IdMot = $this->request->getPost('IdMot');
		$IdReg = $this->request->getPost('IdReg');

		$dataMotor = [
			'NomMot' => $this->request->getPost('NomMot'),
			'TagMot' => $this->request->getPost('TagMot'),
			'MarcaMot' => $this->request->getPost('MarcaMot'),
			'CorrienteMot' => $this->request->getPost('CorrienteMot'),
			'SerieMot' => $this->request->getPost('SerieMot'),
			'VelocidadMot' => $this->request->getPost('VelocidadMot'),
			'PotenciaMot' => $this->request->getPost('potenciaMotor'),
			'modelMot' => $this->request->getPost('modelMot'),
			'TensionMot' => $this->request->getPost('TensionMot'),
			'hzMot' => $this->request->getPost('hzMot'),
			'fsMot' => $this->request->getPost('fsMot')
		];
		$this->model->db->table('motores')->where('IdMot', $IdMot)->update($dataMotor);

		$dataEncabezado = [
			'IdPar' => $this->request->getPost('IdPar'),
			'UsuCre' => $this->request->getPost('UsuCre'),
			'IdMot' => $IdMot
		];

		$response = $this->model->db->table('regevalmot')->where('IdReg', $IdReg)->update($dataEncabezado);
		return $this->response->setJSON($response);
	}

	public function ajaxPostNewMant()
	{
		// Obtener los datos enviados en la solicitud POST
		$datosMant = [
			'IdMot' => $this->request->getPost('IdMot'),
			'Desc' => $this->request->getPost('desc'),
			'FrecM' => $this->request->getPost('frecm'),
			'TipPar' => $this->request->getPost('tpar'),
			'HH' => $this->request->getPost('hh'),
			'Duracion' => $this->request->getPost('dur'),
			'Cantidad' => $this->request->getPost('cant'),
			'FecM1' => $this->request->getPost('fecm1'),
			'FecM2' => $this->request->getPost('fecm2'),
			'ProxFec' => $this->request->getPost('fecprox')
		];

		$response = $this->model->db->table('planMant')->insert($datosMant);
		return $this->response->setJSON($response);

	}

	public function listMot()
	{
		$response = $this->model->db->table('motores')
			->select("*")
			->get()
			->getResultArray();
		return $this->response->setJSON($response);
	}

	// APROBACION Y DENEGACION DE FUNCIONES 
	public function ajaxAprobPost()
	{
		$IdUsu = $this->request->getPost('idUsu');
		$IdReg = $this->request->getPost('idReg');
		$text = $this->request->getPost('buttonText');

		if($text === "Aprobar"){
			$data = [
				'EstReg' => 3
			];
		}elseif($text === "Desaprobar"){
			$data = [
				'EstReg' => 1
			];
		}

		$response = $this->model->db->table('regevalmot')->where('IdReg', $IdReg)->update($data);
		return $this->response->setJSON($response);
	}

	public function ajaxNotificationPost()
	{
		// Obtener los datos enviados en la solicitud POST
		$idReg = $this->request->getPost('idReg');
		$datosNot = [
			'IdUsu' => $this->request->getPost('idUsu'),
			'IdReg' => $this->request->getPost('idReg'),
			'FecEjec' => $this->request->getPost('fechaActual')
		];
		$this->model->db->table('notif')->insert($datosNot);

		$dataUpdate = [
			'EstReg' => 2
		];
		$response = $this->model->db->table('regevalmot')->where('IdReg', $IdReg)->update($dataUpdate);;
		return $this->response->setJSON($response);
	}

	public function ajaxNotificationPostSup()
	{
		$idReg = $this->request->getPost('idReg');
		$datosNot = [
			'IdUsu' => $this->request->getPost('idUsu'),
			'IdReg' => $this->request->getPost('idReg'),
			'descripcion' => $this->request->getPost('descripcion'),
			'FecEjec' => $this->request->getPost('fechaActual'),
		];
		$this->model->db->table('notif')->insert($datosNot);
	}

	public function ajaxHistMot()
	{
		$usu = session()->get("IdUsu");
		$response = $this->model->db->table('regevalmot')
				->select("*")
				->join('paradas', 'paradas.IdPar = regevalmot.IdPar', 'left')
				->join('motores', 'motores.IdMot = regevalmot.IdMot', 'left')
				->join('usuarios', 'usuarios.IdUsu = regevalmot.UsuMod')
				->where('regevalmot.UsuMod IS NOT NULL', null, false)
				->orWhere('regevalmot.UsuMod !=', '')
				->get()
				->getResultArray();
	
		return $this->response->setJSON($response);
	}

}
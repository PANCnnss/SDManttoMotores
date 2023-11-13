<?php 
namespace App\Libraries;

class PrintForm {
    /**
	 * Constructor
	 *
	 * Inicializa la instancia de CodeIgniter y setea el layout por defecto
	 */
	public function __construct()
	{
	}
	public static function println($tx, array $r, $t,$pre=true){ //Testear array
		if($t){
        	echo "<br><br>$tx: ".($pre?"<pre>":""); print_r($r); echo ($pre?"</pre>":"")." <br><br>";
		}
    }
    public static function printtx($tx,$t){ //Testear array
		if($t){
        	echo "$tx\n";
		}
    }
	public static function printlq($model,$t){ // Testear query
		if($t){
        	echo "<br><br>LQ: <pre> ".$model->getLastQuery()->getQuery()." </pre> <br><br>";
		}
    }
	public static function printdm($tx, $var,$t){ // Print dump
		if($t){
        	echo "<br><br>$tx: ";
			var_dump($var);
		}
    }
	public static function checkexist($model,$tab,$criteria,$times=1){ //Confirmar si criterio existe más de x veces
		try {
			$q = $model->db
				->table($tab)
				->where($criteria)
				->get()
				->getRowArray();
			$nr = count($q);
			if($q) return ['rslt'=>true,'r'=>($nr >= $times),'msg'=>'CORRECTO','lq'=>$model->getLastQuery()->getQuery()];
			return ['rslt'=>false,'r'=>false,'msg'=>"Fallo Query ".$model->getLastQuery()->getQuery()];
		} catch (\Throwable $th) {
			return ['rslt'=>false,'r'=>false,'msg'=>$th->getMessage()." F>".$th->getFile()." L>".$th->getLine()];
		}
		
	}
	public static function fprintForm($input, $b, $dtreg)
	{
		$d = $b && isset($input["data"]["name"]);
		$s = "";
		switch ($input["type"]) {
			case 'select':
				$s .= "<label class='control-label col-form-label'> " . $input["label"] . " </label>";
				if (array_key_exists("disabled", $input) && $input["disabled"]) $input["data"]["disabled"] = true;
				if (array_key_exists("readonly", $input) && $input["readonly"]) $input["data"]["readonly"] = true;
				$s .= '<div class="input-group">';
				$s .= form_dropdown(($d ? $input["data"]["name"] : ''), $input["options"], ($d ? $dtreg[$input["data"]["name"]] : ''), $input["data"]);
				$s .= '</div>';
				if (array_key_exists("valid-feed", $input)) $s .= '<div class="valid-feedback"> ' . $input["valid-feed"] . '</div>';
				if (array_key_exists("invalid-feed", $input)) $s .= '<div class="invalid-feedback"> ' . $input["invalid-feed"] . '</div>';
				break;
			case 'input':
				$s .= '<div class="form-group">';
				if (array_key_exists("label", $input)) $s .= "<label class='control-label col-form-label'> " . $input["label"] . " </label>";
				if (array_key_exists("disabled", $input) && $input["disabled"]) $input["data"]["disabled"] = true;
				if (array_key_exists("readonly", $input) && $input["readonly"]) $input["data"]["readonly"] = true;
				$input["data"]["value"] = ($d && array_key_exists($input["data"]["name"], $dtreg) ? $dtreg[$input["data"]["name"]] : (isset($input["data"]["value"]) ? $input["data"]["value"] : ''));
					$s .= "<div class='input-group'>";
						if (array_key_exists("preigtext", $input)) $s .= "<span class='input-group-text'>" . $input["preigtext"] . "</span>";
						$s .= form_input($input["data"]);
						if (array_key_exists("posigtext", $input)) $s .= "<span class='input-group-text'>" . $input["posigtext"] . "</span>";
						if (array_key_exists("valid-feed", $input)) $s .= '<div class="valid-feedback"> ' . $input["valid-feed"] . '</div>';
						if (array_key_exists("invalid-feed", $input)) $s .= '<div class="invalid-feedback"> ' . $input["invalid-feed"] . '</div>';
					$s .= '</div>';
				$s .= '</div>';
				break;
			case 'textarea':
				if (array_key_exists("label", $input)) $s .= "<label class='control-label col-form-label'> " . $input["label"] . " </label>";
				if (array_key_exists("disabled", $input) && $input["disabled"]) $input["data"]["disabled"] = true;
				if (array_key_exists("readonly", $input) && $input["readonly"]) $input["data"]["readonly"] = true;
				$s .= '<div class="input-group">';
				$input["data"]["value"] = ($d ? $dtreg[$input["data"]["name"]] : (isset($input["data"]["value"]) ? $input["data"]["value"] : ''));
				$s .= '</div>';
				$s .= form_textarea($input["data"]);
				if (array_key_exists("valid-feed", $input)) $s .= '<div class="valid-feedback"> ' . $input["data"]["valid-feed"] . '</div>';
				if (array_key_exists("invalid-feed", $input)) $s .= '<div class="invalid-feedback"> ' . $input["data"]["invalid-feed"] . '</div>';
				break;
			case 'check':
				if ($d && $dtreg[$input["data"]["name"]]) $input["data"]["checked"] = "true";
				if (array_key_exists("disabled", $input) && $input["disabled"]) $input["data"]["disabled"] = true;
				if (array_key_exists("readonly", $input) && $input["readonly"]) $input["data"]["readonly"] = true;
				$input["data"]["value"] = ($d ? $dtreg[$input["data"]["name"]] : (isset($input["data"]["value"]) ? $input["data"]["value"] : ''));
				$s .= form_input(["type" => "hidden", "name" => $input["data"]["id"], "id" => $input["data"]["id"], "value"=>$input["data"]["value"], "class" => "oinpval"]);
				if (array_key_exists("value",$input["data"]) && $input["data"]["value"] == 1) $input["data"]["checked"] = true;
				if (array_key_exists("class",$input["data"])) $input["data"]["class"] = "material-inputs oinpchk";
				$input["data"]["oinp"] = $input["data"]["id"];
				unset($input["data"]["name"]);
				// $input["data"]["name"].="ch";
				$input["data"]["id"].="ch";
				$s .= "<div class='form-check form-check-inline'>" . form_input($input["data"]);
				$s .= "<label class='form-check-label' id='".($input["data"]["id"]."lb")."' for='" . $input["data"]["id"] . "'> " . $input["label"] . " </label></div>";
				break;
			case 'legend':
				$s .= "<legend> " . $input["label"] . " </legend>";
				break;
			case 'button':
				$dis = (array_key_exists("disabled", $input) && $input["disabled"] ? "disabled" : "");
				$lab = $input["label"];
				$ic = $input["icon"];
				$attrs = '';
				foreach ($input["data"] as $k => $v)
					$attrs .= " $k = '$v'";
				$s .= "<a $attrs $dis> $lab <span class='btn-label'><i class='$ic'></i></span> </a>";
				break;
			case 'text':
				$s .= $input["text"];
				break;
			case 'lcheck':
				$st = $input["state"]; //1> edit ini, 2> edit fin, 3> Ver
				$s .= "<div class='row'>";
				foreach ($input['arr'] as $v) {
					$nom = $v[0]; //Nombre
					$ini = $v[1]; //CInicio
					$fin = $v[2]; //CFin
					$des = $v[3]; //Desc
					$di = ["type" => "hidden", "name" => $ini, "id" => "id$ini", "value"=>($b?$dtreg[$ini]:1)];
					$si = form_input(($b?$di:array_merge($di,["disabled" => "true"])));
					$si .= '<input type="checkbox" id="'.$ini.'" oinp="id'.$ini.'" class="filled-in chk-col material-inputs chcls" '.($b && $dtreg[$ini] == 1 || !$b?"checked":"").' '.($st == 1 || $st == 3?"":"disabled").' value="'.$dtreg[$ini].'">';
					// $si .= "Val>".$dtreg[$ini];
					$df = ["type" => "hidden", "name" => $fin, "id" => "id$fin", "value"=>($b?$dtreg[$fin]:1)];
					$sf = form_input(($b?$df:array_merge($df,["disabled" => "true"])));
					$sf .= '<input type="checkbox" id="'.$fin.'" oinp="id'.$fin.'" class="filled-in chk-col material-inputs chcls" '.($b && $dtreg[$fin] == 1?"checked":"").' '.($st == 2 || $st == 3?"":"disabled").' value="'.$dtreg[$fin].'">';
					// $sf .= "Val>".$dtreg[$fin];

					$s .= "<div class='".$input["subclass"]."'>";
						$s .= "<div class='form-group row'>";
							$s .= '<div class="col-md-8 col-sm-8"><label>'.$des.'</label></div>';
							$s .= '<div class="col-md-2 col-sm-2">'.$si.'<label for="'.$ini.'">I</label></div>';
							$s .= '<div class="col-md-2 col-sm-2">'.$sf.'<label for="'.$fin.'">F</label></div>';
						$s .= "</div>";
					$s .= "</div>";
				}
				$s .= "</div>";
				break;
		}
		return $s;
	}
	public static function printFormCard($li, $dtreg)
	{
		$li; //Lista de los inputs a imprimir
		$s = '
			<div class="row">
		';
		$w = 0;
		$b = isset($dtreg);
		// var_dump($li,$dtreg);
		foreach ($li as $input){
			if (($w + $input["wdth"]) > 12){ //Si se sobrepasan los 12 md o si es el inicio
				$s .= '
					</div>
					<div class="row" '.(isset($input["divid"])?'id="'.$input["divid"].'"':'').'>
				';
			}
			$w = (($w + $input["wdth"]) > 12 ? $input["wdth"] : $w + $input["wdth"]);
			$s .= '<div class="'.$input["class"] .'" '.(isset($input["divid"])?'id="'.$input["divid"].'"':"").'>';
			$s .= PrintForm::fprintForm($input, $b, ($b ? $dtreg : null));
			$s .= '</div>';
		}
		$s .= '
			</div>
		';
		echo '<div class="card"><div class="card-body">'.$s.'</div></div>';
	}

	public static function printFormGroup($li, $dtreg)
	{
		$li; //Lista de los inputs a imprimir
		$s = '
			<div class="row">
		';
		$w = 0;
		$b = isset($dtreg);
		// var_dump($li,$dtreg);
		foreach ($li as $input){
			if (($w + $input["wdth"]) > 12){ //Si se sobrepasan los 12 md o si es el inicio
				$s .= '
					</div>
					<div class="row">
				';
			}
			$w = (($w + $input["wdth"]) > 12 ? $input["wdth"] : $w + $input["wdth"]);
			$s .= '<div class="'.$input["class"] .'" id="'.(isset($input["id"])?$input["id"]:"").'">';
			$s .= PrintForm::fprintForm($input, $b, ($b ? $dtreg : null));
			$s .= '</div>';
		}
		$s .= '
			</div>
		';
		echo '<div class="form-group">'.$s.'</div>';
	}
}

<?= $this->extend('layouts/layout_trab') ?>

<?= $this->section('content') ?>

<style>
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	caption {
		display: flex;
		flex-direction: row;
		flex: 1;
		text-align: center;
		align-items: center;
		justify-content: center;
	}

	caption div * {
		width: 100%;
		background-color: red;
	}

	h1 {
		text-align: center;
	}

	table,
	th,
	td {
		border: 1px solid black;
		border-collapse: collapse;
	}

	.table-photos {

		border: 1px solid black;
	}

	.table-photos th,
	td {
		text-align: center;
	}

	.table-photos td img {
		width: 275px;
		padding: 10px;
	}

	.lbl {
		background-color: yellow;
	}

	.table-photos div {
		border-collapse: collapse;
		display: flex;
		flex-direction: column;
	}

	.table-photos img {
		flex: 1;
		width: 300px;
	}

	.table-photos div {
		border: 1px solid;
	}

	.title {
		text-align: center;
	}

	.item div:nth-child(2n) {
		align-items: center;
		justify-content: center;
	}

	.title-page2 {
		display: flex;
		flex-direction: row;

		align-items: center;
		justify-content: center;
		height: fit-content;
	}

	.title-page2 div {
		flex: 1;
		border: 1px solid black;
		text-align: center;

	}

	.title-page1 {
		display: flex;
		flex-direction: row;
		flex: 1;
		text-align: center;
		align-items: center;
		justify-content: center;


	}

	.title-page1 div {
		border: 1px solid black;

	}

	.table1 th,
	.table1 td {
		font-size: 50%;
		text-align: center;
		padding-top: 1px;
		padding-botton: 1px;
		vertical-align: middle;
	}

	.table1 {
		width: 296px;
	}

	.table1 th:last-child,
	.table1 td:last-child {
		white-space: nowrap;
	}

	input {
		margin-top: 1px;
		margin-bottom: 1px;
		border: none;
		width: 70px;
	}

	input:focus {
		outline: none;
	}

	.container {
		width: 297mm;
		height: 207mm;
		display: flex;
		align-items: center;
		justify-content: center;
	}
</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-12">
			<div class="card">
				<div class="card-body">
					<ul class="nav nav-tabs mb-3">
						<li class="nav-item">
							<a href="#tabs1" data-toggle="tab" aria-expanded="true" class="nav-link active">
								<i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
								<span class="d-none d-lg-block">Lista Intervenciones</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#tabs2" data-toggle="tab" aria-expanded="false" class="nav-link">
								<i class="mdi fa-solid fa-clipboard d-lg-none d-block mr-1"></i>
								<span class="d-none d-lg-block">Lista Registros</span>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane show active" id="tabs1">
							<?php if (session()->get("IdTUsu") === '2') : ?>
								<button type="button" style="color: white;" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalParada"><i class="fas fa-plus"></i>&nbsp; Nueva Intervención</button>
							<?php endif; ?>
							<table id="tpar" class="table table-striped table-bordered display" style="width:100%"></table>
						</div>
						<div class="tab-pane" id="tabs2">
							<a style="color: white;" href="<?php echo site_url('manttomot/nuevoreg'); ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i>&nbsp; Nuevo Registro</a>
							<table id="treg" class="table table-striped table-bordered display" style="width:100%"></table>
						</div>
					</div>
				</div> <!-- end card-body-->
			</div> <!-- end card-->
		</div>

		<!-- MODAL PARADAS -->
		<div class="modal fade" id="modalParada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myModalLabel">Crear nueva intervencion</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="#" method="post" id="postParada">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nombre">Nombre Intervencion</label>
										<input type="text" name="NomPar" id="nombre" class="form-control">
									</div>
									<div class="form-group">
										<label for="estado">Estado</label>
										<select name="Estado" id="estado" class="form-control">
											<option value="0">Pendiente</option>
											<option value="1">Iniciado</option>
											<option value="2">Completado</option>
											<option value="3">Entregado</option>
										</select>
									</div>
									<div class="form-group">
										<label for="fechaInicio">Fecha Inicio</label>
										<input type="date" name="FecIni" id="fechaInicio" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="tecnico">Asignado a:</label>
										<select name="UsuCre" id="tecnico" class="form-control">
                                        	<option value="">Seleccionar</option>
                                    	</select>
									</div>
									<div class="form-group">
										<label for="supervisor">Supervisor</label>
										<select name="UsuSup" id="supervisor" class="form-control">
                                        	<option value="">Seleccionar</option>
                                    	</select>
									</div>
									<div class="form-group">
										<label for="fechaFin">Fecha Fin</label>
										<input type="date" name="FecFin" id="fechaFin" class="form-control">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="nomarea">Ubicacion:</label>
										<select name="NomArea" id="nomarea" class="form-control">
                                        	<option value="Antapaccay">Antapaccay</option>
                                        	<option value="Tintaya">Tintaya</option>
                                    	</select>
									</div>
									<div class="form-group">
										<label for="descripcion">Descripción</label>
										<textarea name="DescPar" id="descripcion" class="form-control" required></textarea>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

	<!-- PDF A GENERAR 	 -->
	<div hidden>
	<div id="pdf-to-print">
		<div class="container" id="pdf-page" style="font-family: Arial, sans-serif !important; color: black !important;">


		<table class="table1">

			<tbody>
			<tr>
				<td><img src=<?=base_url("theme/src/assets/images/antapacay.png")?> alt="oa" width="100px"></td>
				<td colspan="11">
				<h1 style="font-size: 17px; color:black;">Formato de Registro de mantenimiento preventivo de motores
					electricos de baja, media tensión y alta
					tensión
					según la norma NFPA70B</h1>
				</td>
				<td> <img src=<?=base_url("theme/src/assets/images/sdise.png") ?> alt="ooo" width = "200px"></td>
			</tr>
			<tr>
				<th class="lbl" scope="row" rowspan="1">NOMBRE DEL MOTOR</th>
				<td colspan="12"><input type="text" id="nomMot"></td>

			</tr>
			<tr>
				<th class="lbl" scope="row" rowspan="1">NOMBRE DEL AREA</th>
				<td colspan="12"><input type="text" id="nomArea"></td>
			</tr>
			<tr>
				<th class="lbl" scope="row" rowspan="1">FECHA DE INVESTIGACIÓN</th>
				<td colspan="12"><input type="text" id="fecCre"></td>
			</tr>
			<tr>
				<th class="lbl" scope="row" rowspan="1">PERSONAL A CARGO</th>
				<th scope="row">LIDER</th>
				<td colspan="2"> <input type="text" id="supsdise"></td>
				<th scope="row">TECNICO</th>
				<td colspan="8"><input type="text" id="tecsdise"></td>
			</tr>
			<tr>
				<td><input></td>
				<td colspan="12"><input></td>
			</tr>
			<tr>
				<th class="lbl" scope="row" rowspan="2">DATOS DEL MOTOR</th>
				<th scope="col" colspan="1">TAG</th>
				<th scope="col" colspan="1">MARCA</th>
				<th scope="col" colspan="1">SERIE</th>
				<th scope="col" colspan="1">POTENCIA</th>
				<th scope="col" colspan="1">TENSION</th>
				<th scope="col" colspan="1">CORRIENTE</th>
				<th scope="col" colspan="1">VEL(RPM)</th>
				<th scope="col" colspan="1">MEL</th>
				<th scope="col" colspan="1">FRAME</th>
				<th scope="col" colspan="1">SER F.</th>
				<th scope="col" colspan="1">HZ</th>
				<th scope="col" colspan="1">CATALOGO</th>
			</tr>

			<tr>
				<td><input type="text" id="tag"></td>
				<td><input type="text" id="marca"></td>
				<td><input type="text" id="serie"></td>
				<td><input type="text" id="potencia"></td>
				<td><input type="text" id="tension"></td>
				<td><input type="text" id="corriente"></td>
				<td><input type="text" id="vel"></td>
				<td><input type="text" id="mel"></td>
				<td><input type="text" id="frame"></td>
				<td><input type="text" id="serf"></td>
				<td><input type="text" id="hz"></td>
				<td><input type="text" id="catalogo"></td>
			</tr>
			<tr>
				<td><input></td>
				<td colspan="12"><input></td>
			</tr>
			<tr>
				<th class="lbl" scope="row" rowspan="12">TRABAJOS REALIZADOS</th>



				<td colspan="12"style="text-align: left;">Mantenimiento y limpieza de exterior de motor.<input type="text" id="work-realized"></td>
			</tr>
			<tr>
				<td colspan="12"style="text-align: left;">Verificación de caja de conexiones<input type="text" id="work-realized"></td>
			</tr>
			<tr>
				<td colspan="12"style="text-align: left;">Desconexión y revisión de terminales.<input type="text" id="work-realized"></td>
			</tr>
			<tr>
				<td colspan="12"style="text-align: left;">Verificación de torque de cable de fuerza.<input type="text" id="work-realized"></td>
			</tr>
			<tr>
				<td colspan="12"style="text-align: left;">Verificación de torque de pernos de sujeción de la caja de conexiones hacia el motor.<input type="text" id="work-realized"></td>
			</tr>
			<tr>
				<td colspan="12"style="text-align: left;">Verificación cambio de encapsulado de conexiones.<input type="text" id="work-realized"></td>
			</tr>
			<tr>
				<td colspan="12"style="text-align: left;">Verificación del estado de cableado y conexionado de RTD y HEATER.<input type="text" id="work-realized"></td>
			</tr>
			<tr>
				<td colspan="12"style="text-align: left;">Conexionado de terminales.<input type="text" id="work-realized"></td>
			</tr>
			<tr>
				<td colspan="12"style="text-align: left;">Verificación del estado de las botoneras.<input type="text" id="work-realized"></td>
			</tr>
			<tr>
				<td colspan="12"style="text-align: left;">Hermetizados de tapas.<input type="text" id="work-realized"></td>
			</tr>
			<tr>
				<td colspan="12"style="text-align: left;">Inspección y limpieza de ventiladores.<input type="text" id="work-realized"></td>
			</tr>
			<tr>
				<td colspan="12"style="text-align: left;">Inspección y limpieza de grasera.<input type="text" id="work-realized"></td>
			</tr>

			<tr>
				<td></td>
				<th class="lbl" colspan="12">LECTURA DE RESISTENCIA DE AISLAMIENTO A TIERRA(ESTATOR)</th>
			</tr>

			<tr>
				<th class="lbl" scope="row" rowspan="2">DATOS DEL MEGOMETRO</th>
				<th scope="row" rowspan="1" colspan="2">Megohmetro Megabras</th>
				<td scope="row" rowspan="1" colspan="2"><input type="text" id="nommeg"></td>
				<th colspan="2">SERIE</th>
				<td colspan="2"><input type="text" id="megserie"></td>
				<th colspan="2">Tension de Prueba:</th>
				<td colspan="2"><input type="text" id="megtension"></td>
			</tr>
			<tr>
				<th colspan="2">Temperatura Ambiente</th>
				<td colspan="2"><input type="text" id="megtemp"></td>
				<th colspan="2"></th>
				<td colspan="2"></td>
				<th colspan="2">Tiempo de Prueba</th>
				<td colspan="2"><input type="text" id="megtiemp"></td>
			</tr>
			<tr>
				<th class="lbl" scope="row" rowspan="4">DATOS DE PRUEBA DEL MEGOMETRO</th>
				<th class="lbl" colspan="2">Tiempo</th>
				<th class="lbl" colspan="2">LECTURA(giga homs)</th>
				<th class="lbl" colspan="1">INDICE</th>
				<th class="lbl" colspan="7">OBSERVACIONES</th>
			</tr>
			<tr>
				<th colspan="2">30 segundos</th>
				<th colspan="2"><input id="lec30seg"></th>
				<th colspan="1"><input id="ind30seg"></th>
				<th colspan="7"><input id="obs30seg"></th>
			</tr>
			<tr>
				<th colspan="2">60 segundos</th>
				<th colspan="2"><input id="lec60seg"></th>
				<th colspan="1"><input id="ind60seg"></th>
				<th colspan="7"><input id="obs60seg"></th>
			</tr>
			<tr>
				<th colspan="2">10 min</th>
				<th colspan="2"><input id="lec10min"></th>
				<th colspan="1"><input id="ind10min"></th>
				<th colspan="7"><input id="obs10min"></th>
			</tr>
			<tr>
				<td><input></td>
				<td colspan="12"><input></td>
			</tr>
			<tr>
				<th class="lbl" scope="row" rowspan="3">SUGERENCIAS Y/O RECOMENDACIONES</th>
				<td colspan="12" rowspan="1"style="text-align: left;">
				Se recomienda realizar un análisis vibracional y una inspección termográfica para observar el estado del motor en funcionamiento.</td>
			</tr>
			<tr>
				<td colspan="12" rowspan="1"style="text-align: left;">
				Se recomienda realizar mantenimiento preventivo de los cables de alimentación, tubería Conduit, Liquid Tight del motor eléctrico periódicamente.
				</td>
			</tr>
			<tr>
				<td colspan="12" rowspan="1"style="text-align: left;">
				Presencia de óxido.</td>
			</tr>
			<tr>
				<th class="lbl" scope="row" rowspan="3">PLAN DE ACCIÓN</th>
				<td colspan="10" style="background-color: red; text-align: left;">Colocar un techo para la cuchilla de conexión</td>
				<td style="background-color: yellow" rowspan="3">LEYENDA</td>
				<td style="background-color: green">1</td>


			</tr>
			<tr>
				<td colspan="10" rowspan="1"><input type="text" class="plan"></td>
				<td style="background-color: yellow">2</td>
			</tr>
			<tr>
				<td colspan="10" rowspan="1"><input type="text" class="plan"></td>
				<td style="background-color: red">3</td>
			</tr>
			</tbody>
		</table>
		</div>

		<div class="container" id="pdf-page" style="font-family: Arial, sans-serif !important; color: black !important;">

		<table class="table-photos">
			<tr>
			<td>
				<img src=<?=base_url("theme/src/assets/images/antapacay.png") ?> alt="antapacay"
				style="width:100px height:  !important;">
			</td>
			<td colspan="2">
				<h1 style="font-size: 17px; color:black;">ANEXO FOTOGRAFICO</h1>
				<h1 style="font-size: 17px; color:black;"><span id="tagMotor"></span></h1>
			</td>
			<td>
				<img src=<?=base_url("theme/src/assets/images/sdise.png") ?> alt="sdise"
				style="width:200px !important;">
			</td>
			</tr>
			<tr>
			<th>1. Placa del Motor</th>
			<th>2. Condiciones Iniciales</th>
			<th>3. Conexion</th>
			<th>4. Finalización de Mantenimiento</th>
			</tr>
			<tr>
			<td class="img-photo"><img src="" alt="oa" id="img1"></td>
			<td class="img-photo"><img src="" alt="oa" id="img2"></td>
			<td class="img-photo"><img src="" alt="oa" id="img3"></td>
			<td class="img-photo"> <img src="" alt="oa" id="img4"></td>
			</tr>
			<tr>
			<th>5. TAG de la Botonera</th>
			<th>6. Condiciones Generales</th>
			<th>7. Conexionado</th>
			<th>8. Finalizacion del Mantenimiento</th>
			</tr>
			<tr>
			<td class="img-photo"><img src="" alt="oa" id="img5"></td>
			<td class="img-photo"><img src="" alt="oa"width="100"  id="img6"></td>
			<td class="img-photo"><img src="" alt="oa" width="100"  id="img7"></td>
			<td class="img-photo"><img src="" alt="oa" id="img8"></td>
			</tr>
		</table>

		</div>
		<div class="container" id="pdf-page" style="font-family: Arial, sans-serif !important; color: black !important;">

		<table class="table-photos">
			<tr>
			<td>
				<img src=<?=base_url("theme/src/assets/images/antapacay.png") ?> alt="antapacay"
				style="width:100px !important;">
			</td>
			<td colspan="2">
				<h1 style="font-size: 17px; color:black;">ANEXO FOTOGRAFICO</h1>
				<h1 style="font-size: 17px; color:black;"><span id="tagMotor"></span></h1>
			</td>
			<td>
				<img src=<?=base_url("theme/src/assets/images/sdise.png") ?> alt="sdise"
				style="width:200px !important;">
			</td>
			</tr>
			<tr>
			<th colspan="2">1. Placa del Motor</th>
			<th colspan="2">2. Condiciones Iniciales</th>¿
			</tr>
			<tr>
			<td colspan="2" class="img-photo"><img src="" alt="oa" id="img1"></td>
			<td colspan="2" class="img-photo"><img src="" alt="oa" id="img2"></td>
			</tr>
			<tr>
			<th colspan="2">3. TAG de la Botonera</th>
			<th colspan="2">4. Condiciones Generales</th>
			</tr>
			<tr>
			<td colspan="2" class="img-photo"><img src="" alt="oa" id="img5"></td>
			<td colspan="2" class="img-photo"><img src="" alt="oa" width="100"  id="img6"></td>
			</tr>
		</table>

		</div>
	</div>
	</div>

    <!-- PDF A IMPRIMIR  CONTENIDO-PDF2 -->
	<div hidden>
		<div id="pdf-to-print-2" style="padding:20px; padding-bottom:50px; color:black!important;">
			<!-- PAGINA 1 PDF -->
			<div class="container" id="pdf-page" style="border-color:black; font-size:0.74vw;width: 210mm;height: 278.3mm">

				<div style="padding:8px;margin-top:30px;">
					<div class="row">
						<img src="../resources/imagenes/antapaccay.png" width="15%" height="25%" style="margin-right:2em;margin-top:-6em;">
						<h4 style="text-align:center; font-weight:bold;color:black;">INFORMACIÓN DE PRUEBA DE MOTOR</h4>
					</div>

					<!-- NUMERO DE HOJA -->
					<div class="row">
						<h5 style="font-size:0.8vw;color:black;">HOJA N°:</h5>

						<div class="col" style="margin-top:-2px;margin-left:-8px">
							<span id="">01</span>
							<hr width="25%" style="margin-left:0px;margin-top:-2px;color:black;">
						</div>
					</div>
					<!-- FIN DE PRIMERA FILA -->

					<!-- RANGO DE 3 COLUMNAS -->
					<div class="row">
						<div class="col">
							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">CLIENTE:</h5>
								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="cliente">Antapaccay</span>
									<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>

							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">DIRECCIÓN:</h5>
								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="direccion">-</span>
									<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>
						</div>

						<div class="col" style="margin-left: 12px;">
							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">FECHA:</h5>
								<div class="col" style="margin-top:-2px;margin-left:-8px">
								<span id="fecha">-</span>
								<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>

							</div>
							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">TEMP. AIRE:</h5>
								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="temp">16°C</span>
									<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>
						</div>

						<div class="col" style="margin-left: 12px;">
							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">PROYECTO N°:</h5>
								<div class="col" style="margin-top:-2px;margin-left:-8px">
								<span id="proyecto">-</span>
								<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>

							</div>
							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">REL. HUMEDAD:</h5>
								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="relhum">-</span>
									<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>
						</div>
					</div>
					<!-- FIN RANGO 3 COLUMNAS -->

					<!-- RANGO 2 COLUMNAS -->
					<div class="row">
						<div class="col">
							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">PROPIETARIO/USUARIO:</h5>
								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="propiet">Mantenimiento Elect.</span>
									<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>

							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">DIRECCIÓN:</h5>
								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="direccion2">-</span>
									<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>
						</div>

						<div class="col">
							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">FECHA ULTIMA DE INSPECCION:</h5>
								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="fecult">-</span>
									<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>

							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">REPORTE DE ULTIMA INSPECCION:</h5>
								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="reportult">-</span>
									<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>
						</div>
					</div>
					<!-- FIN RANGO 2 COLUMNAS -->

					<!-- UBICACION E IDENTIFICACION EQUIPO -->
					<div class="row" style="margin-top:1em;">
						<h5 style="font-size:0.8vw;color:black;">UBICACION DEL EQUIPO:</h5>

						<div class="col" style="margin-top:-2px;margin-left:-8px">
							<span id="ubequip">-</span>
							<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
						</div>
					</div>
					
					<div class="row">
						<h5 style="font-size:0.8vw;color:black;">IDENTIFICACION DEL CIRCUITO:</h5>

						<div class="col" style="margin-top:-2px;margin-left:-8px">
							<span id="identcir">-</span>
							<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
						</div>
					</div>
					<!-- FIN UBICACION E IDENTIFICACION EQUIPO -->

					<!-- INFORMACION DE PRUEBA DEL MOTOR -->
					<div class="container-fluid">
						<h4 style="font-weight: bold; text-align:center;color:black;">INFORMACION DE PRUEBA DE MOTOR</h4>
						<div style="padding-left:10em;">
							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">RESULTADO DE PRUEBAS DE RESISTENCIA DE AISLAMIENTO:</h5>

								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="resMega">-</span>
									<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>

							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">30 seg:</h5>

								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="30seg">-</span><span> GΩ</span>
									<hr width="35%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>

							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">60 seg:</h5>

								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="60seg">-</span><span> GΩ</span>
									<hr width="35%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>

							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">10 min:</h5>

								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="10min">-</span>
									<hr width="35%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>

							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">DA:</h5>

								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="DA">-</span>
									<hr width="37.5%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>

							<div class="row">
								<h5 style="font-size:0.8vw;color:black;">PI:</h5>

								<div class="col" style="margin-top:-2px;margin-left:-8px">
									<span id="NomUsuRecibe">-</span>
									<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>
						</div>

						<!-- Detalles desde la A a la S motor-->
						<div class="row">
							<div class="col">
								<h5 style="font-size:0.8vw;color:black;">A. NOMBRE & MARCA DEL MOTOR</h5>
								<h5 style="font-size:0.8vw;color:black;">B. FABRICANTE</h5>
								<h5 style="font-size:0.8vw;color:black;">C. MODELO NUMERO</h5>
								<h5 style="font-size:0.8vw;color:black;">D. NUMERO DE SERIE</h5>
								<h5 style="font-size:0.8vw;color:black;">E. RPM</h5>
								<h5 style="font-size:0.8vw;color:black;">F. FRAME</h5>
								<h5 style="font-size:0.8vw;color:black;">G. CODIGO</h5>
								<h5 style="font-size:0.8vw;color:black;">H. POTENCIA (HP)</h5>
								<h5 style="font-size:0.8vw;color:black;">I. VOLTAJE & FASE DEL FABRICANTE</h5>
								<h5 style="font-size:0.8vw;color:black;">J. CORRIENTE DEL FABRICANTE</h5>
								<h5 style="font-size:0.8vw;color:black;">K. VOLTAJE REAL</h5>
								<h5 style="font-size:0.8vw;color:black;">L. CORRIENTE REAL</h5>
								<h5 style="font-size:0.8vw;color:black;">M. ARRANCADOR DEL FABRICANTE</h5>
								<h5 style="font-size:0.8vw;color:black;">N. TAMAÑO DE ARRANCADOR</h5>
								<h5 style="font-size:0.8vw;color:black;">O. TAMAÑO HEATER, CATALOGO & AMP</h5>
								<h5 style="font-size:0.8vw;color:black;">P. ELEMENTO DUAL DEL FABRICANTE</h5>
								<h5 style="font-size:0.8vw;color:black;">Q. CORRIENTE DEL FUSIBLE</h5>
								<h5 style="font-size:0.8vw;color:black;">R. FACTOR DE POTENCIA</h5>
								<h5 style="font-size:0.8vw;color:black;">S. FACTOR DE SERVICIO</h5>
							</div>

							<div class="col">
								<div class="col" style="margin-top:-6px;margin-left:-8px">
									<span id="nommot" style="font-size:9px;">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-10px;margin-left:-8px">
									<span id="fabr">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-10px;margin-left:-8px">
									<span id="model">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-10px;margin-left:-8px">
									<span id="numserie">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-10px;margin-left:-8px">
									<span id="rpm">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-10px;margin-left:-8px">
									<span id="frame">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-10px;margin-left:-8px">
									<span id="codigo">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-10px;margin-left:-8px">
									<span id="potencia">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-10px;margin-left:-8px">
									<span id="voltaje">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-8px;margin-left:-8px">
									<span id="corriente">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-8px;margin-left:-8px">
									<span id="volreal">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-8px;margin-left:-8px">
									<span id="correal">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-8px;margin-left:-8px">
									<span id="arrancador">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-8px;margin-left:-8px">
									<span id="tamarran">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-8px;margin-left:-8px">
									<span id="tmheater">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-8px;margin-left:-8px">
									<span id="elemdual">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-8px;margin-left:-8px">
									<span id="corrfus">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-8px;margin-left:-8px">
									<span id="factpot">-</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
								<div class="col" style="margin-top:-8px;margin-left:-8px">
									<span id="factserv">1</span>
									<hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
								</div>
							</div>
						</div>
						<!-- fin de los detalles -->

						<!-- Observaciones -->
						<div>
							<span id="Observaciones" style="color:black;">OBSERVACIONES</span>
							<hr width="100%" style="margin-top:-3px;color:black;">
							<hr width="100%" style="margin-top:20px;color:black;">
							<hr width="100%" style="margin-top:20px;color:black;">
						</div>
						<!-- fin de las observaciones -->
						
						<div class="row" style="padding-left:15px;">
							<div class="col-8">
								<div class="row">
									<h5 style="font-size:0.8vw;color:black;">EQUIPO DE PRUEBA UTILIZADO:</h5>
									<div class="col" style="margin-top:-2px;margin-left:-8px">
										<span id="equiprueb">MEGABRAS MD 10KVR</span>
										<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
									</div>
								</div>

								<div class="row">
									<h5 style="font-size:0.8vw;color:black;">PRESENTADO POR:</h5>
									<div class="col" style="margin-top:-2px;margin-left:-8px">
										<span id="usupres">-</span>
										<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
									</div>
								</div>
							</div>

							<div class="col-4">
								<div class="row">
									<h5 style="font-size:0.8vw;color:black;">SERIAL #:</h5>
									<div class="col" style="margin-top:-2px;margin-left:-8px">
										<span id="equipserie">-</span>
										<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
									</div>
								</div>

								<div class="row">
									<h5 style="font-size:0.8vw;color:black;">PRUEBA:</h5>
									<div class="col" style="margin-top:-2px;margin-left:-8px">
										<span>-</span>
										<hr width="100%" style="margin-left:0px;margin-top:-2px;color:black;">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- fin de la informacion prueba -->
				</div>
			</div>
		</div>
	</div>
    <!--END PDF_TO_PRINT-->
  <!-- FIN PDF A GENERAR  -->

<?= $this->endSection() ?>
<?= $this->section('js') ?>

<script>
	var tpar, treg
	(function() {
		'use strict';
		window.addEventListener('load', function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();

	var fd = <?php echo (session()->getFlashdata() ? json_encode(session()->getFlashdata()) : json_encode("")) ?>;
	if (fd != "") {
		console.log(fd.msg);
		//Mostrar toast
		if (fd.r) toastr.success(fd.msg, 'Éxito');
		else toastr.error(fd.msg, 'Error');
	}

	var cols = JSON.parse('<?php echo $cols ?>');
	var colsr = JSON.parse('<?php echo $colsr ?>');
	// console.log(cols);
	tpar = $("#tpar").DataTable({
      ajax:{
        url: cadenaurl + '/' + ctrl + "/ajaxlpar",
        type: "POST"
      },
      order: [[ 2, 'asc' ]],
      columns: cols,
      columnDefs: [
        {//Estado
          render: function ( data, type, row ) {
            l = {"0": "<a class='btn btn-rounded btn-danger' title='PENDIENTE'></a>",
				"1": "<a class='btn btn-rounded btn-primary' title='INICIADO'></a>",
				"2": "<a class='btn btn-rounded btn-primary' title='COMPLETADO'></a>", 
				"3": "<a class='btn btn-rounded btn-success' title='ENTREGADO'></a>"}
            return l[row.Estado];
          },
          targets: cols.length-2 //Column Estado
        },
        { //Acciones
            render: function ( data, type, row ) {
                // console.log("ROW>",data,type,row);
                return '<a href="#" title="Editar Parada" class="btn waves-effect btn-circle waves-light"><i class="ti-pencil-alt text-success"></i></a>';
            },
            targets: cols.length-1 //Column Acciones
        },
      ],
      // Atributos comprimidos
      "scrollX": true,"autoWidth": true,"scrollCollapse": true,"pagingType": "full_numbers","lengthMenu": [ [15, 25, 50, -1], [15, 25, 50, "All"] ],language: { paginate: { previous: "<", next: ">" } },"paging": true,"processing": true,"searching": true,"lengthChange": true,"ordering": false,"info": false,"bProcessing": true,"pageLength": 15,"oLanguage": {"sUrl": cadenaurl + "resources/json/spanish.json"},pagingType: $(window).width() < 768 ? "simple" : "simple_numbers",
      "fnInitComplete": function () {
        const ps = new PerfectScrollbar('.dataTables_scrollBody')
        $(".selectAll").on( "click", function(e) {
          if ($(this).is( ":checked" )) {
              tabasis.rows().select();        
          } else {
              tabasis.rows().deselect(); 
          }
        })
      },
      "fnDrawCallback": function (oSettings) {const ps = new PerfectScrollbar('.dataTables_scrollBody');},
    })
	treg = $("#treg").DataTable({
      ajax:{
        url: cadenaurl + '/' + ctrl + "/ajaxlreg",
        type: "POST"
      },
      columns: colsr,
      columnDefs: [
        {//Estado
          render: function ( data, type, row ) {
            l = {"0": "<a class='btn btn-rounded btn-danger' title='Pendiente'></a>",
				"1": "<a class='btn btn-rounded btn-primary' title='Iniciado'></a>", 
				"2": "<a class='btn btn-rounded btn-success' title='Completado'></a>",
				"3": "<a class='btn btn-rounded' style='background-color: green' title='Entregado'></a>"}
            return l[row.EstReg];
          },
          targets: colsr.length-2 //Column Estado
        },
        { //Acciones
            render: function ( data, type, row ) {
                // console.log("ROW>",data,type,row);
                return '<a href="'+cadenaurl+ctrl+"/editar/"+row.IdReg+'" title="Editar Registro" class="btn waves-effect btn-circle waves-light"><i class="ti-pencil-alt text-success"></i></a>'
                + '<a onclick="eliminarRegistro('+row.IdReg+')" title="Eliminar Registro" class="btn waves-effect btn-circle waves-light"><i class="ti-close text-danger"></i></a>'
				+ '<a onclick="getData('+row.IdReg+')" title="Generar PDF" class="btn waves-effect btn-circle waves-light">PDF</a>';
            },
            targets: colsr.length-1 //Column Acciones
        },
      ],
      // Atributos comprimidos
      "scrollX": true,"autoWidth": true,"scrollCollapse": true,"pagingType": "full_numbers","lengthMenu": [ [15, 25, 50, -1], [15, 25, 50, "All"] ],language: { paginate: { previous: "<", next: ">" } },"paging": true,"processing": true,"searching": true,"lengthChange": true,"ordering": false,"info": false,"bProcessing": true,"pageLength": 15,"oLanguage": {"sUrl": cadenaurl + "resources/json/spanish.json"},pagingType: $(window).width() < 768 ? "simple" : "simple_numbers",
      "fnInitComplete": function () {
        const ps = new PerfectScrollbar('.dataTables_scrollBody')
        $(".selectAll").on( "click", function(e) {
          if ($(this).is( ":checked" )) {
              tabasis.rows().select();        
          } else {
              tabasis.rows().deselect(); 
          }
        })
      },
      "fnDrawCallback": function (oSettings) {const ps = new PerfectScrollbar('.dataTables_scrollBody');},
    })
	function createFilePond(ref) {
		const inputElement = document.querySelector(ref);
		FilePond.setOptions({
			allowMultiple: true,
			allowReorder: true,
			maxFileSize: "2MB",
		})
		const pond = FilePond.create(inputElement,{
			acceptedFileTypes: ['application/pdf','image/*','video/*'],
			labelFileTypeNotAllowed: 'Archivo de Tipo Inválido',
			files: [
				{
					"source":1, // id on server
					"options":{
						"type":"local",
						"file":{ 
							"name":"resources/imagenes/background-1.jpg",  // url to the file
							"size": 5000, // the file size in bytes
							"type":"JPG" // mimetype
						},
						"metadata":{ "poster":"resources/imagenes/background-1.jpg" }
					}
				}
			],
		});
	}

	$(document).ready(function() {
		$(".nav-toggler").on('click', function () {
			$("#main-wrapper").toggleClass("show-sidebar");
			$(".nav-toggler i").toggleClass("ti-menu");
		});
		FilePond.registerPlugin(
			FilePondPluginMediaPreview,
			FilePondPluginImagePreview,
			FilePondPluginImageExifOrientation,
			FilePondPluginFileValidateSize,
			FilePondPluginFileValidateType,
			FilePondPluginImageEdit,
			FilePondPluginGetFile,
			FilePondPluginImageOverlay,
		);
		// createFilePond("#file")
	})
</script>

<script>
	    // Filtro para usuarios
		$(document).ready(function() {
        $.ajax({
            url: cadenaurl + ctrl + "/filtroUsuarios", // Reemplaza "/tu-controlador" por la URL de tu controlador
            method: 'GET',
            success: function(response) {
                // Llenar el select con los registros obtenidos
                var select1 = $('#tecnico');
                var select2 = $('#supervisor');
                // var select2 = $('#')
                select1.empty(); // Limpiar las opciones existentes
                select2.empty(); // Limpiar las opciones existentes

                // Agregar las opciones de los registros al select
                for (var i = 0; i < response.length; i++) {
                    var registro = response[i];
                    var opcion1 = $('<option></option>').attr('value', registro.IdUsu).text(registro.NomUsu); // Reemplaza "id" y "nombre" por los nombres de tus campos
                    var opcion2 = $('<option></option>').attr('value', registro.IdUsu).text(registro.NomUsu); // Reemplaza "id" y "nombre" por los nombres de tus campos
					select1.append(opcion1);
					select2.append(opcion2);
                }
            },
            error: function() {
                // Manejo de errores
            }
        });
    });
</script>

<!-- POST PARADA  -->
<script>
	$(document).ready(function() {
		// Escuchar el evento submit del formulario
		$('#postParada').submit(function(e) {
			e.preventDefault(); // Evitar que se envíe el formulario de forma convencional

			// Obtener los datos del formulario
			var formData = $(this).serialize();

			// Realizar la solicitud AJAX POST
			$.ajax({
				url: cadenaurl + ctrl + "/postParada", // Reemplaza "/tu-controlador" por la URL de tu controlador
				method: 'POST',
				data: formData,
				success: function(response) {
					// Manejar la respuesta del servidor
					location.reload();
					// Realizar acciones adicionales si es necesario
				},
				error: function() {
					// Manejar errores de la solicitud
				}
			});
		});
	});
</script>

<!-- DELETE REGISTRO -->
<script>
	function eliminarRegistro(id) {
	if (!id) {
		console.log("ID inválido.");
		return;
	}

	Swal.fire({
		title: "¿Desea eliminar este registro?",
		text: "Por favor, confirme la eliminación de este registro",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Sí, Deseo continuar",
		cancelButtonText: "Cancelar",
	}).then((result) => {
		if (result.value) {
		// El usuario hizo clic en "Sí, Deseo continuar", procede con la eliminación
		$.ajax({
			url: cadenaurl + ctrl + "/delRegMot/" + id,
			type: 'POST',
			dataType: 'json',
			success: function (response) {
				Swal.fire(
				"Eliminado",
				"El registro ha sido eliminado exitosamente.",
				"success"
				).then(() => {
				// Recarga la página o realiza alguna otra acción necesaria
				location.reload();
				});
			},
			error: function (xhr, status, error) {
				Swal.fire("Error", "Se produjo un error al eliminar el registro.", "error");
			}
		});
		}
	});
	}
</script>

<script src="https://unpkg.com/js-html2pdf@latest/lib/html2pdf.min.js"></script>

<script>
	function getData(id) {
		$.ajax({
			url: cadenaurl + ctrl + "/dataPDF/"+id,
			method: 'GET',
			dataType: 'json',
			success: function(response) {
				// Manejar los datos devueltos
				// console.log(response);
				$('#nomMot').val(response.data.NomMot);
      			$('#nomArea').val(response.data.NomArea);
      			$('#fecCre').val(response.data.FecCre);
      			$('#supsdise').val("Luis Alvarez");
      			$('#tecsdise').val("Omar Florez/Edgar Melendez");
      			$('#tag').val(response.data.TagMot);
      			$('#marca').val(response.data.MarcaMot);
      			$('#serie').val(response.data.SerieMot);
      			$('#potencia').val(response.data.PotenciaMot);
      			$('#tension').val(response.data.TensionMot);
      			$('#corriente').val(response.data.CorrienteMot);
      			$('#vel').val(response.data.VelocidadMot);
      			$('#mel').val(response.data.MEL);
      			$('#frame').val(response.data.frameMot);
      			$('#serf').val(response.data.fsMot);
      			$('#hz').val(response.data.hzMot);
      			$('#catalogo').val(" ");

				// Para el megometro
      			$('#nommeg').val(response.data.MegMegaReg);
      			$('#megserie').val(response.data.MegSerieReg);
      			$('#megtension').val(response.data.MegTpruReg);
      			$('#megtemp').val(response.data.MegTambReg);
      			$('#megtiemp').val(response.data.MegTiPruReg);

      			$('#lec30seg').val(response.data.MPru30sLectReg);
      			$('#ind30seg').val(response.data.MPru30sIndReg);
      			$('#obs30seg').val(response.data.MPru30sObsReg);

				$('#lec60seg').val(response.data.MPru60sLectReg);
      			$('#ind60seg').val(response.data.MPru60sIndReg);
      			$('#obs60seg').val(response.data.MPru60sObsReg);
      			$('#tagMotor').text(response.data.TagMot);

      			$('#img1').attr('src',response.data.image1_path);
      			$('#img2').attr('src',response.data.image2_path);
      			$('#img3').attr('src',response.data.image3_path);
      			$('#img4').attr('src',response.data.image4_path);
      			$('#img5').attr('src',response.data.image5_path);
      			$('#img6').attr('src',response.data.image6_path);
      			$('#img7').attr('src',response.data.image7_path);
      			$('#img8').attr('src',response.data.image8_path);

				// SEGUNDA PAGINA DEL PDF 
				$('#fecha').text(response.data.FecEjec ? response.data.FecEjec : '-');
				$('#ubequip').text(response.data.NomMot ? response.data.NomMot : '-');
				$('#30seg').text(response.data.MPru30sLectReg ? response.data.MPru30sLectReg : '-');
				$('#60seg').text(response.data.MPru60sLectReg ? response.data.MPru60sLectReg : '-');
				$('#resMega').text(response.data.MegTpruReg ? response.data.MegTpruReg : '-');
				$('#nommot').text(response.data.NomMot ? response.data.NomMot : '-');
				$('#model').text(response.data.modelMot ? response.data.modelMot : '-');
				$('#numserie').text(response.data.SerieMot ? response.data.SerieMot : '-');
				$('#frame').text(response.data.frameMot ? response.data.frameMot : '-');
				$('#potencia').text(response.data.PotenciaMot ? response.data.PotenciaMot : '-');
				$('#voltaje').text(response.data.TensionMot ? response.data.TensionMot : '-');
				$('#corriente').text(response.data.CorrienteMot ? response.data.CorrienteMot : '-');
				$('#equipserie').text(response.data.SerieMot ? response.data.SerieMot : '-');

			},
			error: function(xhr, status, error) {
				console.log(error);
			}, 
        	complete: function(data){
				var element = document.getElementById('pdf-to-print');
				var options = { filename: 'informeParada.pdf' };
				var exporter = new html2pdf(element, {
					margin: 1,
					image: { type: 'jpeg', quality: 1 },
					html2canvas: { scale: 2 },
					jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
				}, options);

				exporter.getPdf(true);
				options.source = element;
				options.download = false;

				html2pdf.getPdf(options);

				myFunction();
			}
		});
	}
</script>

<script>
	function myFunction() {
        var element = document.getElementById('pdf-to-print-2');
        var options = { filename: 'Asignacion.pdf'};
        var exporter = new html2pdf(element, {
                                    margin:0,
                                    jsPDF: {unit: 'mm', format: 'a4', orientation: 'portrait'}
                                },options);

        exporter.getPdf(true);
        options.source = element;
        options.download = false;

        html2pdf.getPdf(options);
    }
</script>

<?= $this->endSection() ?>
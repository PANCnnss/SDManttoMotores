<?= $this->extend('layouts/layout_trab') ?>

<?= $this->section('css') ?>

<style>
  .dz-image-preview {
    background-color: black;
  }
</style>


<?= $this->endSection() ?>

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

	.table1 table,
	.table1 th,
	.table1 td {
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

	.container_1 {
		width: 297mm;
		height: 207mm;
		display: flex;
		align-items: center;
		justify-content: center;
	}
</style>

<style type="text/css">
    p,h3,label {
        color:black !important;
    }
    .well {
        background: none;
        height: 320px;
    }

    .table-scroll tbody {
        position: absolute;
        overflow-y: scroll;
        height: 250px;
    }

    .table-scroll tr {
        width: 100%;
        table-layout: fixed;
        display: inline-table;
    }

    .table-scroll thead > tr > th {
        border: none;
    }
</style>
<?php use App\Libraries\PrintForm; 
// var_dump($dtreg);
?>
<?php
    $fecha_input = date('Y-m-d', strtotime(isset($resultado1->FecCre) ? $resultado1->FecCre : ''));
?>
<div class="container-fluid">
    <div class="row">
        <form class="needs-validation" id="formMotores" novalidate method="post" enctype="multipart/form-data">
            <input type="hidden" name="IdMot" value="<?= isset($resultado1->IdMot) ? $resultado1->IdMot : '' ?>">
            <input type="hidden" name="IdReg" id="IdReg" value="<?= isset($id) ? $id : '' ?>">
            <input type="hidden" name="IdRegMeg" value="<?= isset($resultado1->IdRegMeg) ? $resultado1->IdRegMeg : '' ?>">
            <input type="hidden" name="IdRegMic" value="<?= isset($resultado1->IdRegMic) ? $resultado1->IdRegMic : '' ?>">

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Registro de Anexo Fotográfico</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- FORMULARIO DE IMAGENES  -->
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fileInput1">Placa del Motor:</label>
                                            <input type="file" class="form-control-file" id="fileInput1" name="image1" accept="image/*" capture="user" required >
                                            <img id="imagenPreview1" src="<?= isset($resultado1->image1_path) ? site_url(esc($resultado1->image1_path)) : '' ?>" alt="oa" style="max-width: 180px; max-height: 180px;">
                                        </div>
                                        <div class="form-group">
                                            <label for="fileInput2">Condiciones Iniciales:</label>
                                            <input type="file" class="form-control-file" id="fileInput2" name="image2" accept="image/*" capture="user" required>
                                            <img id="imagenPreview2" src="<?= isset($resultado1->image2_path) ? site_url(esc($resultado1->image2_path)) : '' ?>" alt="oa" style="max-width: 180px; max-height: 180px;">

                                        </div>
                                        <div class="form-group">
                                            <label for="fileInput3">Caja de conexión:</label>
                                            <input type="file" class="form-control-file" id="fileInput3" name="image3" accept="image/*" capture="user" required>
                                            <img id="imagenPreview3" src="<?= isset($resultado1->image3_path) ? site_url(esc($resultado1->image3_path)) : '' ?>" alt="oa" style="max-width: 180px; max-height: 180px;">

                                        </div>
                                        <div class="form-group">
                                            <label for="fileInput4">Sellos de rodamiento:</label>
                                            <input type="file" class="form-control-file" id="fileInput4" name="image4" accept="image/*" capture="user" required>
                                            <img id="imagenPreview4" src="<?= isset($resultado1->image4_path) ? site_url(esc($resultado1->image4_path)) : '' ?>" alt="oa" style="max-width: 180px; max-height: 180px;">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fileInput5">Lubricación:</label>
                                            <input type="file" class="form-control-file" id="fileInput5" name="image5" accept="image/*" capture="user" required>
                                            <img id="imagenPreview5" src="<?= isset($resultado1->image5_path) ? site_url(esc($resultado1->image5_path)) : '' ?>" alt="oa" style="max-width: 180px; max-height: 180px;">

                                        </div>
                                        <div class="form-group">
                                            <label for="fileInput6">Ventiladores del Motor:</label>
                                            <input type="file" class="form-control-file" id="fileInput6" name="image6" accept="image/*" capture="user" required>
                                            <img id="imagenPreview6" src="<?= isset($resultado1->image6_path) ? site_url(esc($resultado1->image6_path)) : '' ?>" alt="oa" style="max-width: 180px; max-height: 180px;">

                                        </div>
                                        <div class="form-group">
                                            <label for="fileInput7">Tag de la botonera:</label>
                                            <input type="file" class="form-control-file" id="fileInput7" name="image7" accept="image/*" capture="user"  required>
                                            <img id="imagenPreview7" src="<?= isset($resultado1->image7_path) ? site_url(esc($resultado1->image7_path)) : '' ?>" alt="oa" style="max-width: 180px; max-height: 180px;">

                                        </div>
                                        <div class="form-group">
                                            <label for="fileInput8">Finalizacion del Mantiniemiento:</label>
                                            <input type="file" class="form-control-file" id="fileInput8" name="image8" accept="image/*" capture="user" required>
                                            <img id="imagenPreview8" src="<?= isset($resultado1->image8_path) ? site_url(esc($resultado1->image8_path)) : '' ?>" alt="oa" style="max-width: 180px; max-height: 180px;">
                                        </div>
                                    </div>
                                </div>
                            </div> 

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario de cabecera  -->
            <div class="card" style="box-shadow: 0 20px 27px 0 rgb(0 0 0 / 15%);">
                <div class="card-body">
                    <div class="row" style="margin-left:0px;">
                        <h3>Responsables</h3>

                        <a class="btn btn-success" onclick="getData(<?= isset($id) ? $id : '' ?>)" title="Generar PDF" style="background-color:red; color:white; margin-left:5px; border-color:red;">PDF</a>
                        <?php if ($resultado1->EstReg === '3') : ?>
                            <p style="background-color: transparent; border: 0px solid #00BFFF; color: #00BFFF; text-decoration: none; padding: 5px 10px;">APROBADO</p>
                        <?php endif; ?>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tecnico">Encargado</label>
                                <input type="text" name="UsuCre" id="tecnico" class="form-control" value="<?= isset($resultado1->UsuCre) ? $resultado1->UsuCre : '' ?>" hidden>
                                <input type="text" class="form-control" value="<?= isset($resultado1->NomUsu) ? $resultado1->NomUsu : '' ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="modificadoPor">Encargado del plan de accion</label>
                                <input type="text" name="modificadoPor" id="modificadoPor" class="form-control"  value="<?= isset($resultado1->encUsu) ? $resultado1->encUsu : '' ?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="supervisor">Tecnico lider</label>
                                <select name="UsuSup" id="UsuSup" class="form-control">
                                    <option value="">Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fechaEfectuado">Fecha Efectuado</label>
                                <input type="datetime-local" name="FecEjec" id="fechaEfectuado" class="form-control" value="<?= isset($resultado1->FecEjec) ? $resultado1->FecEjec : '' ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputField">Tecnicos encargados</label>
                            <input type="text" id="inputField" class="form-control" placeholder="Ingrese un valor y presione Enter">
                            <select multiple id="selectField" name="tecsEval[]" class="form-control"></select>
                        </div>
                    </div>

                    <h3>Datos Intervención</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="parada">Intervencion</label>
                                <select name="IdPar" id="parada" class="form-control">
                                    <option value="">Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input name="DescPar" id="descripcion" class="form-control" value="<?= isset($resultado1->DescPar) ? $resultado1->DescPar : '' ?>"></input>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fechaEfectuado">Fecha Inicio</label>
                                <input type="datetime-local" name="FecIni" id="fechainicio" class="form-control" value="<?= isset($resultado1->FecIni) ? $resultado1->FecIni : '' ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fechaEfectuado">Fecha Fin</label>
                                <input type="datetime-local" name="FecFin" id="fechafin" class="form-control" value="<?= isset($resultado1->FecFin) ? $resultado1->FecFin : '' ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Formulario datos del motor  -->
                    <div class="row" style="margin-top:20px; margin-left:0px;">
                        <!-- Columna 1 - Datos Motor -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="row">
                                    <h3>Datos Motor</h3>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="margin-left:5px;"><i class="fas fa-camera"></i></button>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" id="NomMot" name ="NomMot" value="">
                                            <label for="nombre">Area</label>
                                            <select name="select" id="nombre" class="form-control">
                                                <option value="">Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tag">Tag</label>
                                            <input type="text" name="TagMot" id="tag" class="form-control" value="<?= isset($resultado1->TagMot) ? $resultado1->TagMot : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="marca">Marca</label>
                                            <input type="text" name="MarcaMot" id="marca" class="form-control" value="<?= isset($resultado1->MarcaMot) ? $resultado1->MarcaMot : '' ?>">                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="serie">Serie</label>
                                            <input type="text" name="SerieMot" id="serie" class="form-control" value="<?= isset($resultado1->SerieMot) ? $resultado1->SerieMot : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="potencia">Potencia</label>
                                            <input type="number" name="PotenciaMot" id="potencia" class="form-control" value="<?= isset($resultado1->PotenciaMot) ? $resultado1->PotenciaMot : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tension">Tensión</label>
                                            <input type="text" name="TensionMot" id="tension" class="form-control" value="<?= isset($resultado1->TensionMot) ? $resultado1->TensionMot : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="corriente">Corriente</label>
                                            <input type="text" name="CorrienteMot" id="corriente" class="form-control" value="<?= isset($resultado1->CorrienteMot) ? $resultado1->CorrienteMot : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="velocidad">Velocidad</label>
                                            <input type="text" name="VelocidadMot" id="velocidad" class="form-control" value="<?= isset($resultado1->VelocidadMot) ? $resultado1->VelocidadMot : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="modelo">Modelo</label>
                                            <input type="text" name="modelMot" id="modelo" class="form-control" value="<?= isset($resultado1->modelMot) ? $resultado1->modelMot : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="frame">Frame</label>
                                            <input type="text" name="frameMot" id="frame" class="form-control" value="<?= isset($resultado1->frameMot) ? $resultado1->frameMot : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fs">Ser.F.</label>
                                            <input type="text" name="fsMot" id="fs" class="form-control" value="<?= isset($resultado1->fsMot) ? $resultado1->fsMot : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="hz">H.Z</label>
                                            <input type="text" name="hzMot" id="hz" class="form-control" value="<?= isset($resultado1->hzMot) ? $resultado1->hzMot : '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mel">MEL</label>
                                            <input type="text" name="MEL" id="mel" class="form-control" value="<?= isset($resultado1->MEL) ? $resultado1->MEL : '' ?>">
                                        </div>
                                    </div>
                                    <?php if (session()->get("IdTUsu") === '4') : ?>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="dias">SIGUIENTE MANTENIMIENTO</label>
                                                <input type="text" name="diasInter" id="dias" class="form-control" value="<?= isset($resultado1->diasInter) ? $resultado1->diasInter : '' ?>">
                                            </div>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                        <!-- Columna 2 - Formulario con Checks -->
                        <div class="col-md-6">
                            <div class="card">
                                <h3>Trabajos Realizados</h3>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check1" name="trabR1" <?= $resultado1->trabR1 == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="check1">Mantenimiento y limpieza de exterior de motor.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check2" name="trabR2" <?= $resultado1->trabR2 == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="check2">Verificación de caja de conexiones</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check3" name="trabR3" <?= $resultado1->trabR3 == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="check3">Desconexión y revisión de terminales.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check4" name="trabR4" <?= $resultado1->trabR4 == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="check4">Verificación de torque de cable de fuerza.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check5" name="trabR5" <?= $resultado1->trabR5 == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="check5">Verificación de torque de pernos de sujeción de la caja de conexiones hacia el motor.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check6" name="trabR6" <?= $resultado1->trabR6 == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="check6">Verificación cambio de encapsulado de conexiones.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check7" name="trabR7" <?= $resultado1->trabR7 == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="check7">Verificación del estado de cableado y conexionado de RTD y HEATER.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check8" name="trabR8" <?= $resultado1->trabR8 == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="check8">Conexionado de terminales.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check9" name="trabR9" <?= $resultado1->trabR9 == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="check9">Verificación del estado de las botoneras.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check10" name="trabR10" <?= $resultado1->trabR10 == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="check10">Hermetizados de tapas.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check11" name="trabR11" <?= $resultado1->trabR11 == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="check11">Inspección y limpieza de ventiladores.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check12" name="trabR12" <?= $resultado1->trabR12 == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="check12">Inspección y limpieza de grasera.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- fin formulario datos motor  -->

                    <!-- PLAN DE ACCION -->
                    <div class="row" style="margin-left:0px;">
                        <!-- Columna 1 - PLAN DE ACCIÓN -->
                        <div class="col-md-6">
                            <div class="card" id="card4">
                                <div class="row">
                                    <h3>Plan de acción</h3>
                                    <?php if (session()->get("IdTUsu") === '1') : ?>
                                        <?php if ($resultado1->EstReg === '0' || $resultado1->EstReg === '1') : ?>
                                            <button type="button" class="corregir-button" style="color: red; border-color:red;margin-left: 15px;background: transparent; border-radius:5px;padding:5px;">
                                                <i class="fas fa-times" style="color: red;"></i> Enviar para correccion
                                            </button>
                                        <?php elseif ($resultado1->EstReg === '2' || $resultado1->EstReg === '3') : ?>
                                            <button type="button" class="corregir-button" style="color: green; border-color:green;margin-left: 15px;background: transparent; border-radius:5px;padding:5px;">
                                                <i class="fas fa-check" style="color: green;"></i> Corregido
                                            </button>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (session()->get("IdTUsu") === '2') : ?>
                                        <?php if ($resultado1->EstReg === '2') : ?>
                                            <button type="button" class="sup corregir-button" style="color: green; border-color:green;margin-left: 15px;background: transparent; border-radius:5px;padding:5px; height:50%;">
                                                <i class="fas fa-check" style="color: green;"></i> Aprobar
                                            </button>
                                            <button type="button" class="sup corregir-button" style="color: red; border-color:red;margin-left: 15px;background: transparent; border-radius:5px;padding:5px; height:50%;">
                                                <i class="fas fa-times" style="color: red;"></i> Desaprobar
                                            </button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2" style="margin-left:5px; margin-bottom:15px;"><i class="fas fa-camera"></i></button>

                                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Anexo fotográfico sugerencias</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>

                                            <!-- FORMULARIO DE IMÁGENES -->
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="fileInput1">Imagen 1:</label>
                                                                <input type="file" class="form-control-file" id="file1" name="imagen1" accept="image/*" capture="user">
                                                                <img id="imagePreview1" src="<?= isset($resultado1->img1_path) ? site_url(esc($resultado1->img1_path)) : '' ?>" alt="oa" style="max-width: 180px; max-height: 180px;">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fileInput2">Imagen 2:</label>
                                                                <input type="file" class="form-control-file" id="file2" name="imagen2" accept="image/*" capture="user">
                                                                <img id="imagePreview2" src="<?= isset($resultado1->img2_path) ? site_url(esc($resultado1->img2_path)) : '' ?>" alt="oa" style="max-width: 180px; max-height: 180px;">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="fileInput5">Imagen 3:</label>
                                                                <input type="file" class="form-control-file" id="file3" name="imagen3" accept="image/*" capture="user">
                                                                <img id="imagePreview3" src="<?= isset($resultado1->img3_path) ? site_url(esc($resultado1->img3_path)) : '' ?>" alt="oa" style="max-width: 180px; max-height: 180px;">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fileInput6">Imagen 4:</label>
                                                                <input type="file" class="form-control-file" id="file4" name="imagen4" accept="image/*" capture="user">
                                                                <img id="imagePreview4" src="<?= isset($resultado1->img4_path) ? site_url(esc($resultado1->img4_path)) : '' ?>" alt="oa" style="max-width: 180px; max-height: 180px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <table class="table" id="sugerenciasTable">
                                    <thead>
                                        <tr>
                                        <th style="width: 100px;">RECOMENDACIONES<button type="button" class="btn btn-success btn-sm" id="agregarFila2" style="background-color:red; border:none; margin-left:5px;"><i class="fas fa-plus"></i></button></th>
                                        <th style="width: 50px;">CRITICIDAD</th>
                                        <th style="width: 50px;">Aviso</th>
                                        <th style="width: 50px;">OT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resultado2 as $resultado): ?>
                                        <tr class="filaSug">
                                            <td>
                                                <input type="hidden" class="grestado" name="estado" id="estSug" value="<?= isset($resultado['estado']) ? $resultado['estado'] : '' ?>">
                                                <div class="form-check form-check-inline" style="width:100%">
                                                    <input type="checkbox" class="form-check-input" id="checkSug" <?= $resultado['estado'] == 'COMPLETADA' ? 'checked' : '' ?>/>
                                                    <input type="text" name="TextoSug" class="form-control form-control-lg txtsug" value="<?= isset($resultado['TextoSug']) ? $resultado['TextoSug'] : '' ?>" style="display: inline-block; width: calc(100% - 30px);">
                                                </div>

                                            </td>
                                            <td>
                                                <select name="CritiSug" class="form-control slccrit">
                                                    <option value="1" <?= $resultado['CritiSug'] == '1' ? 'selected' : '' ?>>Bajo - 1</option>
                                                    <option value="2" <?= $resultado['CritiSug'] == '2' ? 'selected' : '' ?>>Medio - 2</option>
                                                    <option value="3" <?= $resultado['CritiSug'] == '3' ? 'selected' : '' ?>>Alto - 3</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="aviso" id="Aviso" class="form-control graviso" value="<?= isset($resultado['aviso']) ? $resultado['aviso'] : '' ?>">
                                            </td>
                                            <td>
                                                <input type="number" name="OT" id="ot" class="form-control grot" value="<?= isset($resultado['ot']) ? $resultado['ot'] : '' ?>">
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Columna 2 - Formulario con Checks -->
                        <div class="col-md-6">
                            <div class="card">
                                <!-- <div class="card-body"> -->
                                    <h3>Trabajos extras</h3>
                                    <div class="form-check">
                                        <input type="checkbox" name="HabPruResTieReg" id="checkbox1" class="form-check-input" <?= $resultado1->HabPruResTieReg == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="checkbox1">Solicitud pruebas de Resistencia de Aislamiento</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="HabPruResOhmReg" id="checkbox2" class="form-check-input" <?= $resultado1->HabPruResOhmReg == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="checkbox2">Solicitud pruebas de resistencia Ohmica</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="HabTorqueReg" id="checkbox3" class="form-check-input" <?= $resultado1->HabTorqueReg == 1 ? 'checked' : '' ?> hidden>
                                        <label class="form-check-label" for="checkbox3">Solicitud torque de pernos</label>
                                    </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Guardar</button>
                        <a onclick="window.history.back()" class="btn btn-danger" style="color: white;">Volver</a>
                    </div>
                </div>

            </div>
            <!-- fin del form de cabecera -->
        </form>

        <!-- Card datos megohometro  -->
        <div class="card" id="card1" style="display: none;">
            <div class="card-body">
                <!-- Formulario Prueba aislamiento tierra -->
                <h3>LECTURA DE RESISTENCIA DE AISLAMIENTO A TIERRA (ESTATOR)</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="MegMegaReg">Megóhmetro Megabras:</label>
                            <input type="text" name="MegMegaReg" id="MegMegaReg" class="form-control" value="<?= $resultado1->MegMegaReg ?>">
                        </div>
                        <div class="form-group">
                            <label for="serie">Serie:</label>
                            <input type="text" name="MegSerieReg" id="serie" class="form-control" value="<?= $resultado1->MegSerieReg ?>">
                        </div>
                        <div class="form-group">
                            <label for="tiempo_prueba">Tiempo de prueba:</label>
                            <input type="text" name="MegTiPruReg" id="tiempo_prueba" class="form-control" value="<?= isset($resultado1->MegTiPruReg) ? $resultado1->MegTiPruReg : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tension_prueba">Tensión de Prueba:</label>
                            <input type="text" name="MegTpruReg" id="tension_prueba" class="form-control" value="<?= isset($resultado1->MegTpruReg) ? $resultado1->MegTpruReg : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="temperatura_ambiente">Temperatura ambiente:</label>
                            <input type="text" name="MegTambReg" id="temperatura_ambiente" class="form-control" value="<?= isset($resultado1->MegTambReg) ? $resultado1->MegTambReg : '' ?>">
                        </div>
                    </div>
                </div>

                <h5>DATOS DE PRUEBA CON EL MEGOMETRO</h5>
                <button class="btn btn-sm btn-secondary" type="button" data-toggle="collapse" data-target="#tablaMegometro" aria-expanded="false" aria-controls="tablaMegometro">
                    Desplegar/ocultar tabla
                </button>
                <div class="collapse mt-3" id="tablaMegometro">
                    <div class="col-xs-8 col-xs-offset-2 well">
                        <table class="table table-scroll">
                            <thead>
                                <tr>
                                    <th>TIEMPO</th>
                                    <th>LECTURA (giga ohms)</th>
                                    <th>INDICE</th>
                                    <th>OBSERVACIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>30 segundos</td>
                                    <td><input type="text" name="MPru30sLectReg" class="form-control" value="<?= isset($resultado1->MPru30sLectReg) ? $resultado1->MPru30sLectReg : '' ?>"></td>
                                    <td><input type="text" name="MPru30sIndReg" class="form-control" value="<?= isset($resultado1->MPru30sIndReg) ? $resultado1->MPru30sIndReg : '' ?>"></td>
                                    <td rowspan="1"><textarea name="MPru30sObsReg" class="form-control"> <?= isset($resultado1->MPru30sObsReg) ? $resultado1->MPru30sObsReg : '' ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>60 segundos</td>
                                    <td><input type="text" name="MPru60sLectReg" class="form-control" value="<?= isset($resultado1->MPru60sLectReg) ? $resultado1->MPru60sLectReg : '' ?>"></td>
                                    <td><input type="text" name="MPru60sIndReg" class="form-control" value="<?= isset($resultado1->MPru60sIndReg) ? $resultado1->MPru60sIndReg : '' ?>"></td>
                                    <td rowspan="1"><textarea name="MPru60sObsReg" class="form-control"><?= isset($resultado1->MPru60sObsReg) ? $resultado1->MPru60sObsReg : '' ?></textarea></td>
                                </tr>
                                <tr class="showi">
                                        <td>2 min</td>
                                        <td><input type="text" name="MPru2mLectReg" class="form-control" value="<?= isset($resultado1->MPru2mLectReg) ? $resultado1->MPru2mLectReg : '' ?>"></td>
                                        <td><input type="text" name="MPru2mIndReg" class="form-control" value="<?= isset($resultado1->MPru2mIndReg) ? $resultado1->MPru2mIndReg : '' ?>"></td>
                                        <td rowspan="1"><textarea name="MPru2mObsReg" class="form-control"><?= isset($resultado1->MPru2mObsReg) ? $resultado1->MPru2mObsReg : '' ?></textarea></td>
                                </tr>
                                <tr class="showi">
                                        <td>3 min</td>
                                        <td><input type="text" name="MPru3mLectReg" class="form-control" value="<?= isset($resultado1->MPru3mLectReg) ? $resultado1->MPru3mLectReg : '' ?>"></td>
                                        <td><input type="text" name="MPru3mIndReg" class="form-control" value="<?= isset($resultado1->MPru3mIndReg) ? $resultado1->MPru3mIndReg : '' ?>"></td>
                                        <td rowspan="1"><textarea name="MPru3mObsReg" class="form-control"><?= isset($resultado1->MPru3mObsReg) ? $resultado1->MPru3mObsReg : '' ?></textarea></td>
                                </tr>
                                <tr class="showi">
                                        <td>4 min</td>
                                        <td><input type="text" name="MPru4mLectReg" class="form-control" value="<?= isset($resultado1->MPru4mLectReg) ? $resultado1->MPru4mLectReg : '' ?>"></td>
                                        <td><input type="text" name="MPru4mIndReg" class="form-control" value="<?= isset($resultado1->MPru4mIndReg) ? $resultado1->MPru4mIndReg : '' ?>"></td>
                                        <td rowspan="1"><textarea name="MPru4mObsReg" class="form-control"><?= isset($resultado1->MPru4mObsReg) ? $resultado1->MPru4mObsReg : '' ?></textarea></td>
                                </tr>
                                <tr class="showi">
                                        <td>5 min</td>
                                        <td><input type="text" name="MPru5mLectReg" class="form-control" value="<?= isset($resultado1->MPru5mLectReg) ? $resultado1->MPru5mLectReg : '' ?>"></td>
                                        <td><input type="text" name="MPru5mIndReg" class="form-control" value="<?= isset($resultado1->MPru5mIndReg) ? $resultado1->MPru5mIndReg : '' ?>"></td>
                                        <td rowspan="1"><textarea name="MPru5mObsReg" class="form-control"><?= isset($resultado1->MPru5mObsReg) ? $resultado1->MPru5mObsReg : '' ?></textarea></td>
                                </tr>
                                <tr class="showi">
                                        <td>6 min</td>
                                        <td><input type="text" name="MPru6mLectReg" class="form-control" value="<?= isset($resultado1->MPru6mLectReg) ? $resultado1->MPru6mLectReg : '' ?>"></td>
                                        <td><input type="text" name="MPru6mIndReg" class="form-control" value="<?= isset($resultado1->MPru6mIndReg) ? $resultado1->MPru6mIndReg : '' ?>"></td>
                                        <td rowspan="1"><textarea name="MPru6mObsReg" class="form-control"><?= isset($resultado1->MPru6mObsReg) ? $resultado1->MPru6mObsReg : '' ?></textarea></td>
                                </tr>
                                <tr class="showi">
                                        <td>7 min</td>
                                        <td><input type="text" name="MPru7mLectReg" class="form-control" value="<?= isset($resultado1->MPru7mLectReg) ? $resultado1->MPru7mLectReg : '' ?>"></td>
                                        <td><input type="text" name="MPru7mIndReg" class="form-control" value="<?= isset($resultado1->MPru7mIndReg) ? $resultado1->MPru7mIndReg : '' ?>"></td>
                                        <td rowspan="1"><textarea name="MPru7mObsReg" class="form-control"><?= isset($resultado1->MPru7mObsReg) ? $resultado1->MPru7mObsReg : '' ?></textarea></td>
                                </tr>
                                <tr class="showi">
                                        <td>8 min</td>
                                        <td><input type="text" name="MPru8mLectReg" class="form-control" value="<?= isset($resultado1->MPru8mLectReg) ? $resultado1->MPru8mLectReg : '' ?>"></td>
                                        <td><input type="text" name="MPru8mIndReg" class="form-control" value="<?= isset($resultado1->MPru8mIndReg) ? $resultado1->MPru8mIndReg : '' ?>"></td>
                                        <td rowspan="1"><textarea name="MPru8mObsReg" class="form-control"><?= isset($resultado1->MPru8mObsReg) ? $resultado1->MPru8mObsReg : '' ?></textarea></td>
                                </tr>
                                <tr class="showi">
                                        <td>9 min</td>
                                        <td><input type="text" name="MPru9mLectReg" class="form-control" value="<?= isset($resultado1->MPru9mLectReg) ? $resultado1->MPru9mLectReg : '' ?>"></td>
                                        <td><input type="text" name="MPru9mIndReg" class="form-control" value="<?= isset($resultado1->MPru9mIndReg) ? $resultado1->MPru9mIndReg : '' ?>"></td>
                                        <td rowspan="1"><textarea name="MPru9mObsReg" class="form-control"><?= isset($resultado1->MPru9mObsReg) ? $resultado1->MPru9mObsReg : '' ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" id="addPru" class="form-check-input" hidden>
                                        <label class="form-check-label" for="addPru">10 minutos</label>
                                    </td>
                                    <td><input type="text" name="MPru10mLectReg" class="form-control" value="<?= isset($resultado1->MPru10mLectReg) ? $resultado1->MPru10mLectReg : '' ?>"></td>
                                    <td><input type="text" name="MPru10mIndReg" class="form-control" value="<?= isset($resultado1->MPru10mIndReg) ? $resultado1->MPru10mIndReg : '' ?>"></td>
                                    <td rowspan="1"><textarea name="MPru10mObsReg" class="form-control"> <?= isset($resultado1->MPru10mObsReg) ? $resultado1->MPru10mObsReg : '' ?></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                            
                </div>

                <!-- Modal Imagenes de ayuda-->
                <div class="modal fade" id="infoModalCard1" tabindex="-1" role="dialog" aria-labelledby="infoModalCard3Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4>Medición del indice de polarización</h4>
                                <img src="<?= base_url('resources/imagenes/megado-grafic.jpeg')?>" alt="Imagen informativa" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    </div>

                </div>

                    <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#infoModalCard1">
                        <i class="fas fa-info-circle"></i>
                    </button>
                    </div>
            </div>
        </div>

        <!-- Card resistencia Ohmica  -->
        <div class="card" id="card2" style="display: none;">
        <!-- Formulario Resistencia OHMICA -->
        <div class="card-body">
        <h3>LECTURA DE MEDIDA DE RESISTENCIA ÓHMICA - ESTATOR</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="microhmetro">Microhmímetro Metrel:</label>
                        <input type="text" name="MicMetReg" id="microhmetro" class="form-control" value="<?= isset($resultado1->MicMetReg) ? $resultado1->MicMetReg : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="cert_calibracion">N° Cert. Calibración:</label>
                        <input type="text" name="MicCertCalReg" id="cert_calibracion" class="form-control" value="<?= isset($resultado1->MicCertCalReg) ? $resultado1->MicCertCalReg : '' ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="temperatura_ambiente">Temperatura ambiente:</label>
                        <input type="text" name="MicTempAmbReg" id="temperatura_ambiente" class="form-control" value="<?= isset($resultado1->MicTempAmbReg) ? $resultado1->MicTempAmbReg : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="conexion_prueba">Conexión de prueba:</label>
                        <input type="text" name="MicConPruReg" id="conexion_prueba" class="form-control" value="<?= isset($resultado1->MicConPruReg) ? $resultado1->MicConPruReg : '' ?>">
                    </div>
                </div>
            </div>
            <button class="btn btn-sm btn-secondary" type="button" data-toggle="collapse" data-target="#tablaMicrohmimetro" aria-expanded="false" aria-controls="tablaMicrohmimetro">
                Mostrar/ocultar tabla
            </button>
            <div class="collapse mt-3" id="tablaMicrohmimetro">
                <table class="table">
                    <thead>
                        <tr>
                            <th>BORNES</th>
                            <th>1-2</th>
                            <th>2-3</th>
                            <th>3-1</th>
                            <th>OBSERVACIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>LECTURA</td>
                            <td><input type="text" name="MicLec12Reg" class="form-control" value="<?= isset($resultado1->MicLec12Reg) ? $resultado1->MicLec12Reg : '' ?>"></td>
                            <td><input type="text" name="MicLec23Reg" class="form-control" value="<?= isset($resultado1->MicLec23Reg) ? $resultado1->MicLec23Reg : '' ?>"></td>
                            <td><input type="text" name="MicLec31Reg" class="form-control" value="<?= isset($resultado1->MicLec31Reg) ? $resultado1->MicLec31Reg : '' ?>"></td>
                            <td rowspan="1"><textarea name="MicObs12Reg" class="form-control"><?= isset($resultado1->MicObs12Reg) ? $resultado1->MicObs12Reg : '' ?></textarea></td>
                        </tr>
                        <tr>
                            <td>DESVALANCE</td>
                            <td><input type="text" name="MicDes12Reg" class="form-control" value="<?= isset($resultado1->MicDes12Reg) ? $resultado1->MicDes12Reg : '' ?>"></td>
                            <td><input type="text" name="MicDes23Reg" class="form-control" value="<?= isset($resultado1->MicDes23Reg) ? $resultado1->MicDes23Reg : '' ?>"></td>
                            <td><input type="text" name="MicDes31Reg" class="form-control" value="<?= isset($resultado1->MicDes31Reg) ? $resultado1->MicDes31Reg : '' ?>"></td>
                            <td rowspan="1"><textarea name="MicObs23Reg" class="form-control"><?= isset($resultado1->MicObs23Reg) ? $resultado1->MicObs23Reg : '' ?></textarea></td>
                        </tr>
                        <tr>
                            <td>RESULTADOS</td>
                            <td><input type="text" name="MicRes12Reg" class="form-control" value="<?= isset($resultado1->MicRes12Reg) ? $resultado1->MicRes12Reg : '' ?>"></td>
                            <td><input type="text" name="MicRes23Reg" class="form-control" value="<?= isset($resultado1->MPru10mLectReg) ? $resultado1->MPru10mLectReg : '' ?>"></td>
                            <td><input type="text" name="MicRes31Reg" class="form-control" value="<?= isset($resultado1->MicRes31Reg) ? $resultado1->MicRes31Reg : '' ?>"></td>
                            <td rowspan="3"><textarea name="MicObs31Reg" class="form-control"> <?= isset($resultado1->MicObs31Reg) ? $resultado1->MicObs31Reg : '' ?></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>

        <!-- Card ajuste de pernos  -->
        <div class="card" id="card3" style="display: none;">
            <!-- Formulario 3 -->
            <div class="card-body">
            <h3>Observaciones antes de realizar el torque de pernos</h3>
            <table class="table" id="pernosCabecera">
                <thead>
                    <tr>
                        <th rowspan="2" class="text-center">VERIFICACIONES PREVIAS AL TORQUE DE PERNOS</th>
                        <th colspan="3" class="text-center">CUMPLIMIENTO</th>
                    </tr>
                    <tr>
                        <th class="text-center">SI</th>
                        <th class="text-center">NO</th>
                        <th class="text-center">N/A</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">Limpieza de Pernos</td>
                        <td class="text-center"><input type="checkbox" class="form-check-input limpPernos" value="0"></td>
                        <td class="text-center"><input type="checkbox" class="form-check-input limpPernos" value="1"></td>
                        <td class="text-center"><input type="checkbox" class="form-check-input limpPernos" value="2"></td>
                    </tr>
                    <tr>
                        <td class="text-center">Limpieza de Tuercas</td>
                        <td class="text-center"><input type="checkbox" class="form-check-input limpTuercas" value="0"></td>
                        <td class="text-center"><input type="checkbox" class="form-check-input limpTuercas" value="1"></td>
                        <td class="text-center"><input type="checkbox" class="form-check-input limpTuercas" value="2"></td>
                    </tr>
                    <tr>
                        <td class="text-center">Limpieza de Caras de Bridas</td>
                        <td class="text-center"><input type="checkbox" class="form-check-input limpBrid" value="0"></td>
                        <td class="text-center"><input type="checkbox" class="form-check-input limpBrid" value="1"></td>
                        <td class="text-center"><input type="checkbox" class="form-check-input limpBrid" value="2"></td>
                    </tr>
                    <tr>
                        <td class="text-center">Pernos Revisados</td>
                        <td class="text-center"><input type="checkbox" class="form-check-input limpBrid" value="0"></td>
                        <td class="text-center"><input type="checkbox" class="form-check-input limpBrid" value="1"></td>
                        <td class="text-center"><input type="checkbox" class="form-check-input limpBrid" value="2"></td>
                    </tr>
                </tbody>
            </table>

            <button class="btn btn-sm btn-secondary mb-3" type="button" data-toggle="collapse" data-target="#tablaEvPernos" aria-expanded="false" aria-controls="tablaVerificaciones">
                Mostrar/ocultar tabla Evaluacion Pernos
            </button>
            <div class="collapse" id="tablaEvPernos">
            <h4>Evaluación de Pernos</h4>
            <button class="btn btn-sm btn-primary mt-3" id="agregarFila" type="button">
                <i class="fas fa-plus"></i> Agregar fila
            </button>

                <table class="table" id="tablaEvaluacionPernos">
                    <thead>
                        <tr>
                            <th>N° de Perno</th>
                            <th>Grado de Dureza</th>
                            <th>Tipo</th>
                            <th>Diametro Pulgada</th>
                            <th>Torque (ft/lb) Requerido</th>
                            <th>Torque (ft/lb) Medido</th>
                            <th>Unidad de Medida</th>
                            <th>Fecha</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="NroPer" class="form-control"></td>
                            <td>
                                <select name="GDurPer" class="form-control">
                                    <option value="">Seleccionar</option>
                                    <option value="2">Dureza 2</option>
                                    <option value="5">Dureza 5</option>
                                    <option value="7">Dureza 7</option>
                                    <option value="8">Dureza 8</option>
                                </select>
                            </td>
                            <td>
                                <select name="TipPer" class="form-control">
                                    <option value="">Seleccionar</option>
                                    <option value="Seco">Seco</option>
                                    <option value="Con Aceite">Con Aceite</option>
                                </select>
                            </td>
                            <td>
                                <select name="DiaPulper" class="form-control">
                                    <option value="">Seleccionar</option>
                                </select>
                            </td>
                            <td><input type="text" name="requerido" class="form-control" readonly></td>
                            <td><input type="text" name="TorMedPer" class="form-control"></td>
                            <td><input type="text" name="unidad" class="form-control" readonly></td>
                            <td><input type="text" name="FecPer" class="form-control"></td>
                            <td><textarea name="ObsPer" class="form-control"></textarea></td>
                        </tr>
                    </tbody>
                </table>

                <h3>Datos Llave</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Llave USADA: TORQUIMETRO 1</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Rango:</td>
                            <td><input type="text" name="LlaveRangoReg" class="form-control"></td>
                            <td>Marca:</td>
                            <td><input type="text" name="LlaveMarcaReg" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>N° Certificado:</td>
                            <td><input type="text" name="LlaveNroCertReg" class="form-control"></td>
                            <td>N° Serie:</td>
                            <td><input type="text" name="LlaveNroSerieReg" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Modal Imagenes de ayuda-->
            <div class="modal fade" id="infoModalCard3" tabindex="-1" role="dialog" aria-labelledby="infoModalCard3Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Secuencia de Torque</h4>
                        <img src="<?= base_url('resources/imagenes/imagenpernos.png')?>" alt="Imagen informativa" class="img-fluid">
                        <h4 style="margin-top:15px;">Grados de dureza</h4>
                        <img src="<?= base_url('resources/imagenes/imagenpernos2.jpeg')?>" alt="Imagen informativa" class="img-fluid">
                        <h4 style="margin-top:15px;">Apriete de tornillos segun grado</h4>
                        <img src="<?= base_url('resources/imagenes/imagenpernos3.jpeg')?>" alt="Imagen informativa" class="img-fluid">
                    </div>
                </div>
            </div>
            </div>

        </div>

            <div class="card-footer">
            <button type="button" class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#infoModalCard3">
                <i class="fas fa-info-circle"></i>
            </button>
            </div>
        </div>

  </div>
</div>

<!-- PDF A GENERAR 	 -->
<div hidden>
    <div id="pdf-to-print">
        <div class="container_1" id="pdf-page" style="font-family: Arial, sans-serif !important; color: black !important;">

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
                <td><input type="text" id="tag2"></td>
                <td><input type="text" id="marca2"></td>
                <td><input type="text" id="serie2"></td>
                <td><input type="text" id="potencia3"></td>
                <td><input type="text" id="tension2"></td>
                <td><input type="text" id="corriente2"></td>
                <td><input type="text" id="vel2"></td>
                <td><input type="text" id="mel2"></td>
                <td><input type="text" id="frame3"></td>
                <td><input type="text" id="serf2"></td>
                <td><input type="text" id="hz2"></td>
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
                <!-- Se recomienda realizar un análisis vibracional y una inspección termográfica para observar el estado del motor en funcionamiento.</td> -->
                -            
            </tr>
            <tr>
                <td colspan="12" rowspan="1"style="text-align: left;">
                <!-- Se recomienda realizar mantenimiento preventivo de los cables de alimentación, tubería Conduit, Liquid Tight del motor eléctrico periódicamente. -->
                -
                </td>
            </tr>
            <tr>
                <td colspan="12" rowspan="1"style="text-align: left;">
                Presencia de óxido.</td>
            </tr>
            <tr>
                <th class="lbl" scope="row" rowspan="3">PLAN DE ACCIÓN</th>
                <td colspan="10" style="text-align: left;" class="plnaccion"></td>
                <td style="background-color: yellow" rowspan="3">LEYENDA</td>
                <td style="background-color: green">1</td>


            </tr>
            <tr>
                <td colspan="10" style="text-align: left;" class="plnaccion"></td>
                <td style="background-color: yellow">2</td>
            </tr>
            <tr>
                <td colspan="10" style="text-align: left;" class="plnaccion"></td>
                <td style="background-color: red">3</td>
            </tr>
            </tbody>
        </table>
        </div>

        <div class="container_1" id="pdf-page" style="font-family: Arial, sans-serif !important; color: black !important;">

        <table class="table-photos" border="1">
            <tr>
            <td>
                <img src=<?=base_url("theme/src/assets/images/antapacay.png") ?> alt="antapacay"
                style="width:180px !important;; height: 100px !important;">
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
        <div class="container_1" id="pdf-page" style="font-family: Arial, sans-serif !important; color: black !important;">
        <table class="table-photos" border="1">
            <tr>
            <td>
                <img src="<?=base_url("theme/src/assets/images/antapacay.png") ?>" alt="antapacay"
                style="width:100px !important;">
            </td>
            <td colspan="2">
                <h1 style="font-size: 17px; color:black;">ANEXO FOTOGRAFICO</h1>
                <h1 style="font-size: 17px; color:black;"><span id="tagMotor"></span></h1>
            </td>
            <td>
                <img src="<?=base_url("theme/src/assets/images/sdise.png") ?>" alt="sdise"
                style="width:200px !important;">
            </td>
            </tr>
            <tr>
            <th colspan="2">1. Anexo 1</th>
            <th colspan="2">2. Anexo 2</th>
            </tr>
            <tr>
            <td colspan="2" class="img-photo"><img src="" alt="Sin Anexo" id="imag1"></td>
            <td colspan="2" class="img-photo"><img src="" alt="Sin Anexo" id="imag2"></td>
            </tr>
            <tr>
            <th colspan="2">3. Anexo 3</th>
            <th colspan="2">4. Anexo 4</th>
            </tr>
            <tr>
            <td colspan="2" class="img-photo"><img src="" alt="Sin Anexo" id="imag3"></td>
            <td colspan="2" class="img-photo"><img src="" alt="Sin Anexo" width="100"  id="imag4"></td>
            </tr>
        </table>

        </div>
    </div>
</div>

<!-- PDF A IMPRIMIR  CONTENIDO-PDF2 -->
<div hidden>
    <div id="pdf-to-print-2" style="padding:20px; padding-bottom:50px; color:black!important;">
        <!-- PAGINA 1 PDF -->
        <div class="container_1" id="pdf-page" style="border-color:black; font-size:0.74vw;width: 210mm;height: 278mm">
            <div style="padding:8px;margin-top:30px;">
                <div class="row">
                    <img src="../../resources/imagenes/antapaccay.png" width="15%" height="25%" style="margin-right:2em;margin-top:-6em;">
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
                        <span id="ubequip">Antapaccay</span>
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
                            <h5 style="font-size:0.8vw;color:black;">IA:</h5>

                            <div class="col" style="margin-top:-2px;margin-left:-8px">
                                <span id="IA">-</span>
                                <hr width="37.5%" style="margin-left:0px;margin-top:-2px;color:black;">
                            </div>
                        </div>

                        <div class="row">
                            <h5 style="font-size:0.8vw;color:black;">PI:</h5>

                            <div class="col" style="margin-top:-2px;margin-left:-8px">
                                <span id="NomUsuRecibe">Si R. Aislamiento >5000 Mohms el IP es irrelevante (Norma IEE St. 43-2013)</span>
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
                                <span id="frame2">-</span>
                                <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                            </div>
                            <div class="col" style="margin-top:-10px;margin-left:-8px">
                                <span id="codigo">-</span>
                                <hr width="80%" style="margin-left:0px;margin-top:-2px;color:black;">
                            </div>
                            <div class="col" style="margin-top:-10px;margin-left:-8px">
                                <span id="potencia2">-</span>
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

        <!-- PAGINA 2 PDF  -->
        <div class="container_1" id="pdf-page" style="border-color:black; font-size:0.74vw;width: 210mm;height: 278mm">               
            <div style="padding:8px;margin-top:30px;">        
                    <div class="row" style="margin-top:150px">
                        <img src="../../resources/imagenes/antapaccay.png" width="15%" height="25%" style="margin-right:2em;margin-top:-6em;">
                        <h4 style="text-align:center; font-weight:bold;color:black;">MANTENIMIENTO ELECTRICO</h4>
                    </div>            
                    <hr>
                <h3 style="color:black;">Prueba de Resistencia de Aislamiento (IEEE 43-2000)</h3>
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3" style="text-align:center">Estator vs masa</th>
                                </tr>
                                <tr>
                                    <th>Tiempo (s)</th>
                                    <th>Resistencia de aislamiento (MOhm)@15°C</th>
                                    <th>Resistencia de aislamiento (MOhm)@40°C</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>30seg</td>
                                    <td><?= $resultado1->MPru30sLectReg?></td>
                                    <td><?= number_format($resultado1->MPru30sLectReg * 0.176776695, 2) ?></td>
                                </tr>
                                <tr>
                                    <td>60seg</td>
                                    <td><?= $resultado1->MPru60sLectReg?></td>
                                    <td><?= number_format($resultado1->MPru60sLectReg * 0.176776695, 2)?></td>
                                </tr>
                            </tbody>    
                        </table>
                        
                        <!-- Tabla parametros y valores  -->
                        <table class="table table-bordered" style="width: 123% !important;">
                            <thead>
                                <tr>
                                    <th>Parametro</th>
                                    <th>Valor</th>
                                    <th>Condicion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>R a 1 min(MΩ)</td>
                                    <td><?= number_format($resultado1->MPru60sLectReg * 0.176776695, 2)?></td>
                                    <td>Bueno</td>
                                </tr>
                                <tr>
                                    <td>PI</td>
                                    <td><?= $resultado1->MPru60sLectReg?></td>
                                    <td>Excelente</td>
                                </tr>
                                <tr>
                                    <td>DAR</td>
                                    <td><?= $resultado1->MPru60sLectReg?></td>
                                    <td>Excelente</td>
                                </tr>
                            </tbody>    
                        </table>
                    </div>
                    <div class="col-md-6">
                        <div id="echartsContainer" style="width: 500px; height: 300px;"></div>
                    </div>
                </div>

                <img src="../../resources/imagenes/tabla_condicion_med.png" alt="" style="width:500px !important;height:500px !important;">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('js') ?>

<script src="https://unpkg.com/js-html2pdf@latest/lib/html2pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.2/echarts.min.js"></script>

<script>
    const inputField = document.getElementById('inputField');
    const selectField = document.getElementById('selectField');

    inputField.addEventListener('keyup', function(event) {
        if (event.key === 'Enter' && inputField.value.trim() !== '') {
            const option = document.createElement('option');
            option.value = inputField.value.trim();
            option.text = inputField.value.trim();
            selectField.appendChild(option);
            inputField.value = ''; // Limpiar el campo de entrada
        }
    });

    selectField.addEventListener('dblclick', function() {
        const selectedOptions = Array.from(selectField.selectedOptions);
        selectedOptions.forEach(function(option) {
            option.remove();
        });
    });
</script>

<script>
    pathArray = location.href.split('/');
    cadenaurl = pathArray[0] + "//" + pathArray[2] + "/";
    var ctrl = '<?php echo (isset($ctrl) ? $ctrl : "") ?>';

    // Filtro para usuarios
    $(document).ready(function() {
        $.ajax({
            url: cadenaurl + ctrl + "/filtroUsuarios", // Reemplaza "/tu-controlador" por la URL de tu controlador
            method: 'GET',
            success: function(response) {
                // Llenar el select con los registros obtenidos
                var select1 = $('#UsuSup');
                // var select2 = $('#')
                select1.empty(); // Limpiar las opciones existentes
                console.log(response);

                // Agregar las opciones de los registros al select
                for (var i = 0; i < response.length; i++) {
                    var registro = response[i];
                    var opcion = $('<option></option>').attr('value', registro.IdUsu).text(registro.NomUsu); // Reemplaza "id" y "nombre" por los nombres de tus campos
                    select1.append(opcion);
                }
            },
            error: function() {
                // Manejo de errores
            }
        });
    });

    // Filtro Motores
    $(document).ready(function() {
        $.ajax({
            url: cadenaurl + ctrl + "/filtroMotores",
            method: 'GET',
            success: function(response) {
                console.log(response);
                var select = $('#nombre');
                // var idMotDesdeInput = $('#data2').val();
                var idMotDesdeInput = <?= $resultado1->IdMot ?>;

                select.empty();

                var defaultOption = $('<option></option>').attr('value', '').text('Selecciona una opción');
                select.append(defaultOption);

                for (var i = 0; i < response.length; i++) {
                    var registro = response[i];

                    var opcion = $('<option></option>')
                        .attr('value', registro.IdMot)
                        .html('<span>' + registro.NomMot + ' - ' + registro.TagMot + '</span>')
                        .data('extra', registro);

                    select.append(opcion);
                }

                select.select2({
                    escapeMarkup: function(markup) {
                        return markup;
                    }
                });

                select.val(idMotDesdeInput).trigger('change');

                var selectedOption = select.find('option:selected');
                var extraData = selectedOption.data('extra');
                var nomMotValue = extraData.NomMot;

                $('#NomMot').val(nomMotValue);


                select.on('change', function() {
                    var selectedOption = $(this).find(':selected');
                    var optionText = selectedOption.text();
                    var extraData = selectedOption.data('extra');

                    // AUTOCOMPLETA DE INPUTS 
                    var campos = {
                        'tag': 'TagMot',
                        'marca': 'MarcaMot',
                        'serie': 'SerieMot',
                        'potencia': 'PotenciaMot',
                        'tension': 'TensionMot',
                        'corriente': 'CorrienteMot',
                        'velocidad': 'VelocidadMot',
                        'modelo': 'modelMot',
                        'frame': 'frameMot',
                        'fs': 'fsMot',
                        'hz': 'hzMot',
                        'mel': 'MEL'
                    };

                    for (var campoId in campos) {
                        var campo = campos[campoId];
                        $('#' + campoId).val(registro[campo]).css('border-color', 'skyblue');
                    }

                    console.log(extraData.NomMot);
                    $('#NomMot').val(extraData.NomMot);
                    
                    Swal.fire({
                        title: 'Mensaje personalizado',
                        text: 'Has seleccionado: ' + optionText + ' con fecha de creacion ' + registro.FecEjec + 
                              ' se llenaran los campos correspondientes al registro de esa fecha',
                        icon: 'info', 
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });
                });

            },
            error: function() {
                console.log("error")
            }
        });
    });

    // Filtro para paradas
    $(document).ready(function() {
        $.ajax({
            url: cadenaurl + ctrl + "/filtroParadas", // Reemplaza "/tu-controlador" por la URL de tu controlador
            method: 'GET',
            success: function(response) {
                // Llenar el select con los registros obtenidos
                var select = $('#parada');
                select.empty(); // Limpiar las opciones existentes

                // Agregar las opciones de los registros al select
                for (var i = 0; i < response.length; i++) {
                    var registro = response[i];
                    var opcion = $('<option></option>').attr('value', registro.IdPar).text(registro.NomPar); // Reemplaza "id" y "nombre" por los nombres de tus campos
                    select.append(opcion);
                }

                      // Obtener el valor del campo hzMot devuelto por el backend
                var hzMotSeleccionado = <?= $resultado1->IdPar ?>;

                // Establecer la opción seleccionada en el select
                select.val(hzMotSeleccionado);
            },
            error: function() {
                // Manejo de errores
            }
        });
    });

    //Autocompletado del input
    $(document).ready(function() {
        $('#parada').change(function() {
            var opcionSeleccionada = $(this).val();

            $.ajax({
                url: cadenaurl + ctrl + "/autocomParda",// Reemplaza "/tu-controlador" por la URL de tu controlador
                method: 'GET',
                data: {
                    opcion: opcionSeleccionada
                },
                success: function(response) {
                    // Aplicar el autocompletado al input
                    $('#descripcion').val(response[0].DescPar);
                },
                error: function() {
                    // Manejo de errores
                }
            });
        });
    });

    $(document).ready(function() {
        // Verificar el estado de los checkboxes al cargar la página
        checkCheckboxState();

        // Escuchar el evento change en los checkboxes
        $('#checkbox1, #checkbox2, #checkbox3').change(function() {
            checkCheckboxState();
        });

        // Función para verificar el estado de los checkboxes y mostrar/ocultar las cards correspondientes
        function checkCheckboxState() {

            if ($('#checkbox1').is(':checked')) {
                $('#card1').appendTo('#formMotores');
                $('#card1').show();
            } else {
                $('#card1').hide();
                $('#card1').appendTo('.container-fluid');
            }

            if ($('#checkbox2').is(':checked')) {
                $('#card2').appendTo('#formMotores');
                $('#card2').show();
            } else {
                $('#card2').hide();
                $('#card2').appendTo('.container-fluid');
            }

            if ($('#checkbox3').is(':checked')) {
                $('#card3').appendTo('#formMotores');
                $('#card3').show();
            } else {
                $('#card3').hide();
                $('#card3').appendTo('.container-fluid');
            }

            
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#agregarFila').on('click', function() {
            var filaVacia = false;
            $('#tablaEvaluacionPernos tbody tr:first-child input').each(function() {
                if ($(this).val() === '') {
                    filaVacia = true;
                    return false; // Salir del bucle cuando se encuentra un campo vacío
                }
            });
            
            if (!filaVacia) {
                var fila = '<tr>' +
                    '<td><input type="text" name="NroPer" class="form-control"></td>' +
                    '<td><input type="text" name="GDuPer" class="form-control"></td>' +
                    '<td><input type="text" name="TipPer" class="form-control"></td>' +
                    '<td><input type="text" name="DiaPulper" class="form-control"></td>' +
                    '<td><input type="text" name="requerido" class="form-control" readonly></td>' +
                    '<td><input type="text" name="TorMedPer" class="form-control"></td>' +
                    '<td><input type="text" name="unidad" class="form-control" readonly></td>' +
                    '<td><input type="text" name="FecPer" class="form-control"></td>' +
                    '<td><textarea name="ObsPer" class="form-control"></textarea></td>' +
                    '</tr>';
                $('#tablaEvaluacionPernos tbody').append(fila);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {

        $('#checkSug').on('change', function() {
            if ($(this).is(':checked')) {
                $('#estSug').val('COMPLETADA');
            } else {
                $('#estSug').val('PENDIENTE');
            }
        });
    });
</script>

<script>
    // Agregar nuevas filas a sugerencia 
    $(document).ready(function() {
        // Escuchar el evento de clic en el botón "Agregar Fila"
        $('#agregarFila2').on('click', function() {
            // Clonar la última fila de la tabla
            var lastRow = $('#sugerenciasTable tbody tr:last').clone();
            
            // Reiniciar los valores de los campos en la nueva fila
            lastRow.find('input[name="TextoSug"]').val('');
            lastRow.find('select[name="CritiSug"]').val('');
            
            // Agregar la nueva fila a la tabla
            $('#sugerenciasTable tbody').append(lastRow);
        });
    });

    $(document).ready(function() {
        // Obtener el campo de selección
        var selectCritiSug = $('select[name="CritiSug"]');
        
        // Escuchar el evento de cambio del campo de selección
        selectCritiSug.on('change', function() {
            // Obtener el valor seleccionado
            var selectedValue = $(this).val();
            
            // Remover todas las clases de color
            selectCritiSug.removeClass('bg-success bg-warning bg-danger');
            
            // Agregar la clase de color correspondiente
            if (selectedValue === '1') {
                selectCritiSug.addClass('bg-success');
            } else if (selectedValue === '2') {
                selectCritiSug.addClass('bg-warning');
            } else if (selectedValue === '3') {
                selectCritiSug.addClass('bg-danger');
            }
        });
    });

    $(document).ready(function() {
        // Establecer los valores por defecto de los checkboxes según los valores obtenidos del backend
        var habPruResTieRegValue = <?= $resultado1->HabPruResTieReg ?>;
        var habPruResOhmRegValue = <?= $resultado1->HabPruResOhmReg ?>;
        var habTorqueRegValue = <?= $resultado1->HabTorqueReg ?>;

        $('input[name="HabPruResTieReg"]').val(habPruResTieRegValue);
        $('input[name="HabPruResOhmReg"]').val(habPruResOhmRegValue);
        $('input[name="HabTorqueReg"]').val(habTorqueRegValue);

        var trabR1 = <?= $resultado1->trabR1 ?>;
        var trabR2 = <?= $resultado1->trabR2 ?>;
        var trabR3 = <?= $resultado1->trabR3 ?>;
        var trabR4 = <?= $resultado1->trabR4 ?>;
        var trabR5 = <?= $resultado1->trabR5 ?>;
        var trabR6 = <?= $resultado1->trabR6 ?>;
        var trabR7 = <?= $resultado1->trabR7 ?>;
        var trabR8 = <?= $resultado1->trabR8 ?>;
        var trabR9 = <?= $resultado1->trabR9 ?>;
        var trabR10 = <?= $resultado1->trabR10 ?>;
        var trabR11 = <?= $resultado1->trabR11 ?>;
        var trabR12 = <?= $resultado1->trabR12 ?>;

        $('input[name="trabR1"]').val(trabR1);
        $('input[name="trabR2"]').val(trabR2);
        $('input[name="trabR3"]').val(trabR3);
        $('input[name="trabR4"]').val(trabR4);
        $('input[name="trabR5"]').val(trabR5);
        $('input[name="trabR6"]').val(trabR6);
        $('input[name="trabR7"]').val(trabR7);
        $('input[name="trabR8"]').val(trabR8);
        $('input[name="trabR9"]').val(trabR9);
        $('input[name="trabR10"]').val(trabR10);
        $('input[name="trabR11"]').val(trabR11);
        $('input[name="trabR12"]').val(trabR12);

        
        // Cambiar el valor del checkbox a 1 cuando se marque
        $('input[name="HabPruResTieReg"], input[name="HabPruResOhmReg"], input[name="HabTorqueReg"]').change(function() {
            if ($(this).is(':checked')) {
                $(this).val(1);
            } else {
                $(this).val(0);
            }
        });

        $('[id^="check"]').change(function() {
            if ($(this).is(':checked')) {
                $(this).val(1);
            } else {
                $(this).val(0);
            }
            // console.log('ID:', $(this).attr('id'), 'Valor:', $(this).val());
        });
    });

</script>

<script>
    $(document).ready(function() {
        $('select[name="GDuPer"], select[name="TipPer"]').change(function() {
            actualizarTercerSelect();
        });

        function actualizarTercerSelect() {
            var durezaSeleccionada = $('select[name="GDuPer"]').val();
            var tipoSeleccionado = $('select[name="TipPer"]').val();


            // Realizar la solicitud AJAX GET
            $.ajax({
            url: cadenaurl + ctrl + "/filtroSelect",
            type: 'GET',
            data: {
                dureza: durezaSeleccionada,
                tipo: tipoSeleccionado
            },
            success: function(response) {
                // Manejar la respuesta del servidor y actualizar el tercer select
                var opciones = '';

                // Construir las opciones del tercer select con los resultados filtrados
                for (var i = 0; i < response.length; i++) {
                    opciones += '<option value="' + response[i].DmPulgadas +','+ response[i].HilosXPulgada +'">' + response[i].DmPulgadas + ', ' + response[i].HilosXPulgada + ' Hilos x Pulgada' +'</option>';
                }

                // Actualizar el tercer select con las nuevas opciones
                $('select[name="DiaPulper"]').html(opciones);
            },
            error: function(xhr, status, error) {
                // Manejar errores en la solicitud AJAX
                console.error(error);
            }
            });
        }
    });

        // Escuchar el evento change en los select
    $('select[name="GDuPer"], select[name="TipPer"], select[name="DiaPulper"]').change(function() {
        var valor1 = $('select[name="GDuPer"]').val();
        var valor2 = $('select[name="TipPer"]').val();
        var valor3 = $('select[name="DiaPulper"]').val();

        // Realizar la solicitud AJAX GET
        $.ajax({
            url: cadenaurl + ctrl + "/filtroInput",
            method: 'GET',
            data: {
                valor1: valor1,
                valor2: valor2,
                valor3: valor3,
            },
            success: function(response) {
                console.log(response)
                // Asignar los valores de la respuesta a los inputs
                $('input[name="requerido"]').val(response[0].TorqueRequerido);
                $('input[name="unidad"]').val('Nm');
            },
            error: function() {
                // Manejo de errores
            }
        });
    });
</script>

<!-- VISTA PREVIA IMAGEN  -->
<script>
    $(document).ready(function() {
        for (var i = 1; i <= 8; i++) {
            $('#fileInput' + i).change(function() {
                // Obtiene el número de input file
                var inputNumber = this.id.match(/\d+/)[0];

                var selectedFile = this.files[0];

                if (selectedFile) {
                    var imageURL = URL.createObjectURL(selectedFile);

                    $('#imagenPreview' + inputNumber).attr('src', imageURL);
                } else {
                    $('#imagenPreview' + inputNumber).attr('src', '');
                }
            });
        }
    });

    $(document).ready(function() {
        for (var i = 1; i <= 4; i++) {
            $('#file' + i).change(function() {
                // Obtiene el número de input file
                var inputNumber = this.id.match(/\d+/)[0];

                var selectedFile = this.files[0];

                if (selectedFile) {
                    var imageURL = URL.createObjectURL(selectedFile);

                    $('#imagePreview' + inputNumber).attr('src', imageURL);
                } else {
                    $('#imagePreview' + inputNumber).attr('src', '');
                }
            });
        }
    });
</script>

<!-- Ocultar y mostrar TR en caso marque prueba de 10min -->
<script>
    $(document).ready(function() {
        $('.showi').hide();

        $('#addPru').change(function() {
            if ($(this).is(':checked')) {
                $('.showi').show();
            } else {

                $('.showi').hide();
            }
        });
    });
</script>

<!-- UPDATE MOTOR  -->
<script>
    $(document).ready(function() {
    $('#formMotores').on('keydown', 'input', function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        return false;
        }
    });

    $('#formMotores').submit(function(event) {
        event.preventDefault();

        var formData = new FormData(this); // Crea un objeto FormData con el formulario
        // console.log(formData);

        $('.filaSug').each(function() {
            var inputValor = $(this).find('.txtsug').val();
            var selectValor = $(this).find('.slccrit').val();
            var inputAviso = $(this).find('.graviso').val();
            var inputot = $(this).find('.grot').val();
            var inputestado = $(this).find('.grestado').val();
            var selectedValues = $('#selectField').val();

            formData.append('TextoSug[]', inputValor);
            formData.append('CritiSug[]', selectValor);
            formData.append('aviso[]', inputAviso);
            formData.append('ot[]', inputot);
            formData.append('estado[]', inputestado);
            formData.append('tecsEval[]', selectedValues);
            
        });

        formData.append('IdReg', $('#IdReg').val());

            $.ajax({
                url: cadenaurl + ctrl + "/ajaxUpdateMotor",
                type: 'POST',
                data: formData,
                processData: false, // Evita el procesamiento automático de datos
                contentType: false, // Evita la configuración automática del tipo de contenido
                dataType: 'json',
                success: function(response) {
                // Tu código de manejo de éxito aquí
                    // location.reload();
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.log(xhr,status, error);
                }
            });
        });
    });
</script>

<!-- NOTIFICACION USUARIO SUPERVISOR -->
<script>
    $('.corregir-button').on('click', function() {
        var reg = $('#IdReg').val();
        console.log(reg);
        var fechaActual = new Date().toISOString().slice(0, 10);
        var idUsu = <?php echo json_encode(session()->get("IdUsu")); ?>;

        var formData = new FormData();
        formData.append('idReg', reg);
        formData.append('fechaActual', fechaActual);
        formData.append('idUsu', idUsu);

        $.ajax({
            url: cadenaurl + ctrl + "/ajaxNotificationPost",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false, 
            dataType: 'json',
            success: function(response) {
                location.reload();
                // console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(xhr,status, error);
            }
        });
    });

    $('.sup').on('click', function() {
        var reg = $('#IdReg').val();
        var idUsu = <?php echo json_encode(session()->get("IdUsu")); ?>;
        var buttonText = $(this).text().trim();

        var formData = new FormData();
        formData.append('idReg', reg);
        formData.append('idUsu', idUsu);
        formData.append('buttonText', buttonText);

        $.ajax({
            url: cadenaurl + ctrl + "/ajaxAprobPost",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false, 
            dataType: 'json',
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log(xhr,status, error);
            }
        });
    });

</script>

<script>
    $(document).ready(function() {
        function generarGraficoLineal() {
            var graficdata = <?php echo json_encode($resultado1); ?>;
            console.log(graficdata.MPru30sLectReg);
            var echartsContainer = document.getElementById('echartsContainer');
            var echartsInstance = echarts.init(echartsContainer);

            var datos = {
                xAxis: {
                    type: 'category',
                    data: ['30 seg', '60 seg']
                },
                yAxis: {
                    type: 'value'
                },
                series: [
                    {
                        data: [graficdata.MPru30sLectReg, graficdata.MPru60sLectReg],
                        type: 'line'
                    },
                    {
                        data: [Number(graficdata.MPru30sLectReg * 0.176776695).toFixed(2), (graficdata.MPru60sLectReg * 0.176776695).toFixed(2)],
                        type: 'line'
                    }
                ]
            };

            echartsInstance.setOption(datos);
        }

        generarGraficoLineal();
    });
</script>

<!-- GENERAR PDF -->
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
      			$('#tag2').val($('#tag').val() || '-');
      			$('#marca2').val($('#marca').val() || '-');
      			$('#serie2').val($('#serie').val() || '-');
      			$('#potencia3').val($('#potencia').val() || '-');
      			$('#tension2').val($('#tension').val() || '-');
      			$('#corriente2').val($('#corriente').val() || '-');
      			$('#vel2').val($('#velocidad').val() || '-');
      			$('#mel2').val($('#mel').val() || '-');
      			$('#frame3').val($('#frame').val() || '-');
      			$('#serf2').val($('#fs').val() || '-');
      			$('#hz2').val($('#hz').val() || '-');
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

                // Obtén todos los elementos td con la clase 'plnaccion'
                var plnaccionElements = $('.plnaccion');

                // Recorre cada elemento td
                plnaccionElements.each(function(index) {
                    // Encuentra el input correspondiente con la clase 'txtsug' basado en el índice
                    var inputTxtsug = $('.txtsug').eq(index);
                    
                    // Obtiene el valor del input y establécelo como el contenido del td
                    $(this).text(inputTxtsug.val());
                });



      			$('#img1').attr('src','https://manttomot.sdise.net/'+ response.data.image1_path).css({ 'max-width': '270px', 'max-height': '220px' });;
      			$('#img2').attr('src','https://manttomot.sdise.net/'+response.data.image2_path).css({ 'max-width': '270px', 'max-height': '220px' });;
      			$('#img3').attr('src','https://manttomot.sdise.net/'+response.data.image3_path).css({ 'max-width': '270px', 'max-height': '220px' });;
      			$('#img4').attr('src','https://manttomot.sdise.net/'+response.data.image4_path).css({ 'max-width': '270px', 'max-height': '220px' });;
      			$('#img5').attr('src','https://manttomot.sdise.net/'+response.data.image5_path).css({ 'max-width': '270px', 'max-height': '220px' });;
      			$('#img6').attr('src','https://manttomot.sdise.net/'+response.data.image6_path).css({ 'max-width': '270px', 'max-height': '220px' });;
      			$('#img7').attr('src','https://manttomot.sdise.net/'+response.data.image7_path).css({ 'max-width': '270px', 'max-height': '220px' });;
      			$('#img8').attr('src','https://manttomot.sdise.net/'+response.data.image8_path).css({ 'max-width': '270px', 'max-height': '220px' });;

      			$('#imag1').attr('src','https://manttomot.sdise.net/'+response.data.img1_path).css({ 'max-width': '270px', 'max-height': '220px' });;
      			$('#imag2').attr('src','https://manttomot.sdise.net/'+response.data.img2_path).css({ 'max-width': '270px', 'max-height': '220px' });;
      			$('#imag3').attr('src','https://manttomot.sdise.net/'+response.data.img3_path).css({ 'max-width': '270px', 'max-height': '220px' });;
      			$('#imag4').attr('src','https://manttomot.sdise.net/'+response.data.img4_path).css({ 'max-width': '270px', 'max-height': '220px' });;

				// SEGUNDA PAGINA DEL PDF 
				$('#fecha').text(response.data.FecEjec ? response.data.FecEjec : '-');
				$('#ubequip').text(response.data.NomMot ? response.data.NomMot : '-');
				$('#30seg').text(response.data.MPru30sLectReg ? response.data.MPru30sLectReg : '-');
				$('#60seg').text(response.data.MPru60sLectReg ? response.data.MPru60sLectReg : '-');
				$('#resMega').text(response.data.MegTpruReg ? response.data.MegTpruReg : '-');
				$('#nommot').text($('#NomMot').val() || '-');
				$('#IA').text($('#MPru60sIndReg').val() || '-');
				$('#model').text($('#modelo').val() || '-');
				$('#numserie').text($('#serie').val() || '-');
				$('#frame2').text($('#frame').val() || '-');
				$('#potencia2').text($('#potencia').val() || '-');
				$('#voltaje').text($('#tension').val() || '-');
				$('#corriente').text($('#corriente').val() || '-');
				$('#equipserie').text($('#serie').val() || '-');

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

<!-- SEGUNDO PDF -->
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
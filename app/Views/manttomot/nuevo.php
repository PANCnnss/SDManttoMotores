<?= $this->extend('layouts/layout_trab') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php use App\Libraries\PrintForm; 
// var_dump($dtreg);
?>

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

<div class="container-fluid">
  <div class="row">
    <form class="needs-validation" id="formMotores" novalidate method="post" enctype="multipart/form-data">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        <label for="fileInput1">Placa del motor:</label>
                                        <input type="file" class="form-control-file" id="fileInput1" name="plcmotor" accept="image/*" capture="user" required>
                                        <img id="imagenPreview1" src="" alt="" style="max-width: 180px; max-height: 180px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="fileInput2">Condiciones iniciales:</label>
                                        <input type="file" class="form-control-file" id="fileInput2" name="condini" accept="image/*" capture="user" required>
                                        <img id="imagenPreview2" src="" alt="" style="max-width: 180px; max-height: 180px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="fileInput3">Caja de conexión:</label>
                                        <input type="file" class="form-control-file" id="fileInput3" name="con" accept="image/*" capture="user" required>
                                        <img id="imagenPreview3" src="" alt="" style="max-width: 180px; max-height: 180px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="fileInput4">Sellos de rodamiento:</label>
                                        <input type="file" class="form-control-file" id="fileInput4" name="finman" accept="image/*" capture="user" required>
                                        <img id="imagenPreview4" src="" alt="" style="max-width: 180px; max-height: 180px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fileInput5">Lubricación:</label>
                                        <input type="file" class="form-control-file" id="fileInput5" name="tag" accept="image/*" capture="user" required>
                                        <img id="imagenPreview5" src="" alt="" style="max-width: 180px; max-height: 180px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="fileInput6">Ventiladores del motor:</label>
                                        <input type="file" class="form-control-file" id="fileInput6" name="congen" accept="image/*" capture="user" required>
                                        <img id="imagenPreview6" src="" alt="" style="max-width: 180px; max-height: 180px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="fileInput7">Tag de la botonera:</label>
                                        <input type="file" class="form-control-file" id="fileInput7" name="conex" accept="image/*" capture="user"  required>
                                        <img id="imagenPreview7" src="" alt="" style="max-width: 180px; max-height: 180px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="fileInput8">Finalizacion del Mantiniemiento:</label>
                                        <input type="file" class="form-control-file" id="fileInput8" name="finmant" accept="image/*" capture="user" required>
                                        <img id="imagenPreview8" src="" alt="" style="max-width: 180px; max-height: 180px;">
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

        <!-- Modal 2  -->
        <div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        <img id="imagePreview1" src="" alt="" style="max-width: 180px; max-height: 180px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="fileInput2">Imagen 2:</label>
                                        <input type="file" class="form-control-file" id="file2" name="imagen2" accept="image/*" capture="user">
                                        <img id="imagePreview2" src="" alt="" style="max-width: 180px; max-height: 180px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fileInput5">Imagen 3:</label>
                                        <input type="file" class="form-control-file" id="file3" name="imagen3" accept="image/*" capture="user">
                                        <img id="imagePreview3" src="" alt="" style="max-width: 180px; max-height: 180px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="fileInput6">Imagen 4:</label>
                                        <input type="file" class="form-control-file" id="file4" name="imagen4" accept="image/*" capture="user">
                                        <img id="imagePreview4" src="" alt="" style="max-width: 180px; max-height: 180px;">
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
                <h3>Responsables</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tecnico">Encargado</label>
                            <input type="text" name="UsuCre" id="tecnico" class="form-control" value="<?=session()->get()["IdUsu"]?>" hidden>
                            <input type="text" class="form-control" value="<?=session()->get()["NomUsu"]?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modificadoPor">Modificado Por</label>
                            <input type="text" name="modificadoPor" id="modificadoPor" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="supervisor">Grupo de trabajo</label>
                            <select name="UsuSup" id="UsuSup" class="form-control">
                                <option value="">Seleccionar</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="fechaEfectuado">Fecha Efectuado</label>
                            <input type="datetime-local" name="FecEjec" id="fechaEfectuado" class="form-control">
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
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input name="DescPar" id="descripcion" class="form-control"></input>
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
                                        <label for="nombre">Area</label><br>
                                        <select name="NomMot" id="nombre" class="form-control">
                                            <option value="">Seleccionar</option>
                                        </select>

                                        <input type="text" id="nombreInput" name="NombreInput" class="form-control" style="display: none;">
                                        <button type="button" id="toggleInput" class="btn btn-link">
                                            <i class="fas fa-edit"></i> Cambiar
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tag">Tag</label>
                                        <input type="text" name="TagMot" id="tag" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="marca">Marca</label>
                                        <input type="text" name="MarcaMot" id="marca" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="serie">Serie</label>
                                        <input type="text" name="SerieMot" id="serie" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="potencia">Potencia</label>
                                        <input type="number" name="PotenciaMot" id="potencia" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tension">Tensión</label>
                                        <input type="text" name="TensionMot" id="tension" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="corriente">Corriente</label>
                                        <input type="text" name="CorrienteMot" id="corriente" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="velocidad">Velocidad</label>
                                        <input type="text" name="VelocidadMot" id="velocidad" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="modelo">Modelo</label>
                                        <input type="text" name="modelMot" id="modelo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="frame">Frame</label>
                                        <input type="text" name="frameMot" id="frame" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fs">Ser.F.</label>
                                        <input type="text" name="fsMot" id="fs" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hz">H.Z</label>
                                        <input type="text" name="hzMot" id="hz" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mel">MEL</label>
                                        <input type="text" name="MEL" id="mel" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Columna 2 - Formulario con Checks -->
                    <div class="col-md-6">
                        <div class="card">
                            <h3>Trabajos Realizados</h3>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check1" name="trabR1" hidden>
                                    <label class="form-check-label" for="check1">Mantenimiento y limpieza de exterior de motor.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check2" name="trabR2" hidden>
                                    <label class="form-check-label" for="check2">Verificación de caja de conexiones</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check3" name="trabR3" hidden>
                                    <label class="form-check-label" for="check3">Desconexión y revisión de terminales.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check4" name="trabR4" hidden>
                                    <label class="form-check-label" for="check4">Verificación de torque de cable de fuerza.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check5" name="trabR5" hidden>
                                    <label class="form-check-label" for="check5">Verificación de torque de pernos de sujeción de la caja de conexiones hacia el motor.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check6" name="trabR6" hidden>
                                    <label class="form-check-label" for="check6">Verificación cambio de encapsulado de conexiones.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check7" name="trabR7" hidden>
                                    <label class="form-check-label" for="check7">Verificación del estado de cableado y conexionado de RTD y HEATER.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check8" name="trabR8" hidden>
                                    <label class="form-check-label" for="check8">Conexionado de terminales.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check9" name="trabR9" hidden>
                                    <label class="form-check-label" for="check9">Verificación del estado de las botoneras.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check10" name="trabR10" hidden>
                                    <label class="form-check-label" for="check10">Hermetizados de tapas.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check11" name="trabR11" hidden>
                                    <label class="form-check-label" for="check11">Inspección y limpieza de ventiladores.</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check12" name="trabR12" hidden>
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
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2" style="margin-left:5px; margin-bottom:15px;"><i class="fas fa-camera"></i></button>
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
                                    <tr class="filaSug">
                                    <td>
                                        <input type="checkbox" class="form-check-input" id="checkSug">
                                        <input type="hidden" class="grestado" name="estado" id="estSug" value="PENDIENTE">
                                        <input type="text" name="TextoSug" class="form-control txtsug" style="display: inline-block; width: calc(100% - 30px);">
                                    </td>
                                    <td>
                                        <select name="CritiSug" class="form-control slccrit" style="width:100%;">
                                        <option value="1">Baja - 1</option>
                                        <option value="2">Media - 2</option>
                                        <option value="3">Alta - 3</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="aviso" id="Aviso" class="form-control graviso">
                                    </td>
                                    <td>
                                        <input type="number" name="OT" id="ot" class="form-control grot">
                                    </td>
                                    </tr>
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
                                    <input type="checkbox" name="HabPruResTieReg" id="checkbox1" class="form-check-input" hidden>
                                    <label class="form-check-label" for="checkbox1">Solicitud pruebas de Resistencia de Aislamiento</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="HabPruResOhmReg" id="checkbox2" class="form-check-input" hidden>
                                    <label class="form-check-label" for="checkbox2">Solicitud pruebas de resistencia Ohmica</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="HabTorqueReg" id="checkbox3" class="form-check-input" hidden>
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
                            <label for="MegMegaReg">Megóhmetro:</label>
                            <input type="text" name="MegMegaReg" id="MegMegaReg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="serie">Serie:</label>
                            <input type="text" name="MegSerieReg" id="serie" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tiempo_prueba">Tiempo de prueba:</label>
                            <input type="text" name="MegTiPruReg" id="tiempo_prueba" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tension_prueba">Tensión de Prueba:</label>
                            <input type="text" name="MegTpruReg" id="tension_prueba" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="temperatura_ambiente">Temperatura ambiente:</label>
                            <input type="text" name="MegTambReg" id="temperatura_ambiente" class="form-control">
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
                                    <td><input type="text" name="MPru30sLectReg" class="form-control"></td>
                                    <td><input type="text" name="MPru30sIndReg" class="form-control"></td>
                                    <td rowspan="1"><textarea name="MPru30sObsReg" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <td>60 segundos</td>
                                    <td><input type="text" name="MPru60sLectReg" class="form-control"></td>
                                    <td><input type="text" name="MPru60sIndReg" class="form-control"></td>
                                    <td rowspan="1"><textarea name="MPru60sObsReg" class="form-control"></textarea></td>
                                </tr>
                                <tr class="showi">
                                    <td>2 min</td>
                                    <td><input type="text" name="MPru2mLectReg" class="form-control"></td>
                                    <td><input type="text" name="MPru2mIndReg" class="form-control"></td>
                                    <td rowspan="1"><textarea name="MPru2mObsReg" class="form-control"></textarea></td>
                                </tr>
                                <tr class="showi">
                                    <td>3 min</td>
                                    <td><input type="text" name="MPru3mLectReg" class="form-control"></td>
                                    <td><input type="text" name="MPru3mIndReg" class="form-control"></td>
                                    <td rowspan="1"><textarea name="MPru3mObsReg" class="form-control"></textarea></td>
                                </tr>
                                <tr class="showi">
                                    <td>4 min</td>
                                    <td><input type="text" name="MPru4mLectReg" class="form-control"></td>
                                    <td><input type="text" name="MPru4mIndReg" class="form-control"></td>
                                    <td rowspan="1"><textarea name="MPru4mObsReg" class="form-control"></textarea></td>
                                </tr>
                                <tr class="showi">
                                    <td>5 min</td>
                                    <td><input type="text" name="MPru5mLectReg" class="form-control"></td>
                                    <td><input type="text" name="MPru5mIndReg" class="form-control"></td>
                                    <td rowspan="1"><textarea name="MPru5mObsReg" class="form-control"></textarea></td>
                                </tr>
                                <tr class="showi">
                                    <td>6 min</td>
                                    <td><input type="text" name="MPru6mLectReg" class="form-control"></td>
                                    <td><input type="text" name="MPru6mIndReg" class="form-control"></td>
                                    <td rowspan="1"><textarea name="MPru6mObsReg" class="form-control"></textarea></td>
                                </tr>
                                <tr class="showi">
                                    <td>7 min</td>
                                    <td><input type="text" name="MPru7mLectReg" class="form-control"></td>
                                    <td><input type="text" name="MPru7mIndReg" class="form-control"></td>
                                    <td rowspan="1"><textarea name="MPru7mObsReg" class="form-control"></textarea></td>
                                </tr>
                                <tr class="showi">
                                    <td>8 min</td>
                                    <td><input type="text" name="MPru8mLectReg" class="form-control"></td>
                                    <td><input type="text" name="MPru8mIndReg" class="form-control"></td>
                                    <td rowspan="1"><textarea name="MPru8mObsReg" class="form-control"></textarea></td>
                                </tr>
                                <tr class="showi">
                                    <td>9 min</td>
                                    <td><input type="text" name="MPru9mLectReg" class="form-control"></td>
                                    <td><input type="text" name="MPru9mIndReg" class="form-control"></td>
                                    <td rowspan="1"><textarea name="MPru9mObsReg" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" id="addPru" class="form-check-input" hidden>
                                        <label class="form-check-label" for="addPru">10 minutos</label>
                                    </td>
                                    <td><input type="text" name="MPru10mLectReg" class="form-control"></td>
                                    <td><input type="text" name="MPru10mIndReg" class="form-control"></td>
                                    <td rowspan="1"><textarea name="MPru10mObsReg" class="form-control"></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                            <label for="microhmetro">Microhmímetro :</label>
                            <input type="text" name="MicMetReg" id="microhmetro" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cert_calibracion">N° Cert. Calibración:</label>
                            <input type="text" name="MicCertCalReg" id="cert_calibracion" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="temperatura_ambiente">Temperatura ambiente:</label>
                            <input type="text" name="MicTempAmbReg" id="temperatura_ambiente" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="conexion_prueba">Conexión de prueba:</label>
                            <input type="text" name="MicConPruReg" id="conexion_prueba" class="form-control">
                        </div>
                    </div>
                </div>
                <button class="btn btn-sm btn-secondary" type="button" data-toggle="collapse" data-target="#tablaMegometro" aria-expanded="false" aria-controls="tablaMegometro">
                    Mostrar/ocultar tabla
                </button>
                <div class="collapse mt-3" id="tablaMegometro">
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
                                <td><input type="text" name="MicLec12Reg" class="form-control"></td>
                                <td><input type="text" name="MicLec23Reg" class="form-control"></td>
                                <td><input type="text" name="MicLec31Reg" class="form-control"></td>
                                <td rowspan="1"><textarea name="MicObs12Reg" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                                <td>DESVALANCE</td>
                                <td><input type="text" name="MicDes12Reg" class="form-control"></td>
                                <td><input type="text" name="MicDes23Reg" class="form-control"></td>
                                <td><input type="text" name="MicDes31Reg" class="form-control"></td>
                                <td rowspan="1"><textarea name="MicObs23Reg" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                                <td>RESULTADOS</td>
                                <td><input type="text" name="MicRes12Reg" class="form-control"></td>
                                <td><input type="text" name="MicRes23Reg" class="form-control"></td>
                                <td><input type="text" name="MicRes31Reg" class="form-control"></td>
                                <td rowspan="3"><textarea name="MicObs31Reg" class="form-control"></textarea></td>
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
                                <select name="GDuPer" class="form-control">
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
            <button  type="button" class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#infoModalCard3">
                <i class="fas fa-info-circle"></i>
            </button>
        </div>
    </div>

  </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('js') ?>

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
    $(document).ready(function() {
        // Manejar el evento de clic en el botón para alternar entre el select y el input
        $('#toggleInput').on('click', function() {
            if ($('#nombre').is(':visible')) {
                // Si el select está visible, ocúltalo y muestra el input
                $('#nombre').hide();
                $('#nombreInput').show().val($('#nombre').val());
                // Cambia los nombres para enviar el valor correcto al servidor
                $('#nombreInput').attr('name', 'NomMot');
                $('#nombre').removeAttr('name');
            } else {
                // Si el input está visible, ocúltalo y muestra el select
                $('#nombreInput').hide();
                $('#nombre').show();
                // Cambia los nombres para enviar el valor correcto al servidor
                $('#nombre').attr('name', 'NomMot');
                $('#nombreInput').removeAttr('name');
            }
        });
    });

</script>

<!-- CONTROL EL MODAL DE IMAGENES  -->
<script>
  // Obtener el botón para abrir el modal y el modal en sí
  var openModalButton = document.getElementById("openModalButton");
  var modal = document.getElementById("myModal");

  // Obtener el botón para cerrar el modal
  var closeModalButton = document.getElementById("closeModalButton");

  // Abrir el modal cuando se haga clic en el botón de abrir
  openModalButton.addEventListener("click", function() {
    modal.style.display = "block";
  });

  // Cerrar el modal cuando se haga clic en el botón de cerrar
  closeModalButton.addEventListener("click", function() {
    modal.style.display = "none";
  });
</script>

<script>
    $(document).ready(function() {
        $('#estSug').val('PENDIENTE');

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
                var select = $('#nombre');
                select.empty();

                var defaultOption = $('<option></option>').attr('value', '').text('Selecciona una opción');
                select.append(defaultOption);

                for (var i = 0; i < response.length; i++) {
                    var registro = response[i];

                    var opcion = $('<option></option>')
                        .attr('value', registro.NomMot)
                        .html('<span>' + registro.NomMot + ' - ' + registro.TagMot + '</span>')
                        .data('extra', registro);

                    select.append(opcion);
                }

                select.select2({
                    escapeMarkup: function(markup) {
                        return markup;
                    }
                });

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
            url: cadenaurl + ctrl + "/filtroParadas",
            method: 'GET',
            success: function(response) {
                var select = $('#parada');
                select.empty();

                for (var i = 0; i < response.length; i++) {
                    var registro = response[i];
                    var opcion = $('<option></option>').attr('value', registro.IdPar).text(registro.NomPar); // Reemplaza "id" y "nombre" por los nombres de tus campos
                    select.append(opcion);
                }
            },
            error: function() {
                // Manejo de errores
            }
        });
    });

    //Autocompletado del input de paradas
    $(document).ready(function() {
        $('#parada').change(function() {
            var opcionSeleccionada = $(this).val();

            $.ajax({
                url: cadenaurl + ctrl + "/autocomParda",
                method: 'GET',
                data: {
                    opcion: opcionSeleccionada
                },
                success: function(response) {
                    $('#descripcion').val(response[0].DescPar);
                }
            });
        });
    });
    $(document).ready(function() {
        $('#checkbox1, #checkbox2, #checkbox3').change(function() {
            // Obtener el ID del checkbox seleccionado
            var checkboxId = $(this).attr('id');

            // Mostrar u ocultar la card correspondiente según el checkbox seleccionado
            if ($(this).is(':checked')) {
                $('#card' + checkboxId.slice(-1)).show();
            } else {
                $('#card' + checkboxId.slice(-1)).hide();
            }
        });
    });

    $(document).ready(function() {
        // Evento para el primer checkbox
        $('#checkbox1').change(function() {
            if ($(this).is(':checked')) {
            // Si el checkbox está marcado, mueve la card 1 dentro del formulario
            $('#card1').appendTo('#formMotores');
            } else {
            // Si el checkbox está desmarcado, mueve la card 1 fuera del formulario
            $('#card1').appendTo('.container-fluid');
            }
        });

        // Evento para el segundo checkbox
        $('#checkbox2').change(function() {
            if ($(this).is(':checked')) {
            // Si el checkbox está marcado, mueve la card 2 dentro del formulario
            $('#card2').appendTo('#formMotores');
            } else {
            // Si el checkbox está desmarcado, mueve la card 2 fuera del formulario
            $('#card2').appendTo('.container-fluid');
            }
        });

        // Evento para el tercer checkbox
        $('#checkbox3').change(function() {
            if ($(this).is(':checked')) {
            // Si el checkbox está marcado, mueve la card 3 dentro del formulario
            $('#card3').appendTo('#formMotores');
            } else {
            // Si el checkbox está desmarcado, mueve la card 3 fuera del formulario
            $('#card3').appendTo('.container-fluid');
            }
        });
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
    // Agregar nuevas filas a sugerencia 
    $(document).ready(function() {
        // Escuchar el evento de clic en el botón "Agregar Fila"
        $('#agregarFila2').on('click', function() {
            var lastRow = $('#sugerenciasTable tbody tr:last').clone();
            
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
        // Establecer el valor predeterminado de los checkboxes en 0
        $('input[name="HabPruResTieReg"], input[name="HabPruResOhmReg"], input[name="HabTorqueReg"]').val(0);

        // Cambiar el valor del checkbox a 1 cuando se marque
        $('input[name="HabPruResTieReg"], input[name="HabPruResOhmReg"], input[name="HabTorqueReg"]').change(function() {
            if ($(this).is(':checked')) {
            $(this).val(1);
            } else {
            $(this).val(0);
            }
        });
    });

    // Funcion para los check de trabajos realizados
    $(document).ready(function() {
        $('[id^="check"]').val(0);

        // Escuchar el evento de cambio para todos los inputs checkbox por su ID
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
        // Escucha el evento change de los 8 inputs file
        for (var i = 1; i <= 8; i++) {
            $('#fileInput' + i).change(function() {
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
        // Escucha el evento change de los 8 inputs file
        for (var i = 1; i <= 4; i++) {
            $('#file' + i).change(function() {
                // Obtiene el número de input file
                var inputNumber = this.id.match(/\d+/)[0];

                // Obtiene el archivo seleccionado
                var selectedFile = this.files[0];

                // Verifica si se seleccionó un archivo
                if (selectedFile) {
                    // Crea una URL temporal para el archivo seleccionado
                    var imageURL = URL.createObjectURL(selectedFile);

                    // Actualiza el atributo src de la imagen correspondiente
                    $('#imagePreview' + inputNumber).attr('src', imageURL);
                } else {
                    // Si no se seleccionó un archivo, borra la vista previa
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

<!-- Formulario de POST en jquery -->
<script>
    $(document).ready(function() {
        $('#formMotores').on('keydown', 'input', function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                return false;
            }
        });

        $('#formMotores').submit(function(event) {
            event.preventDefault(); // Evita que se envíe el formulario de forma tradicional

            // Crear un nuevo objeto FormData
            var formData = new FormData();

            // Obtener los datos del formulario serializado y agregarlos al formData
            var serializedData = $(this).serializeArray();
            $.each(serializedData, function(index, item) {
                formData.append(item.name, item.value);
            });

            // Obtener los datos de todas las filas y agregarlos al formData
            $('.filaSug').each(function() {
                var inputValor = $(this).find('.txtsug').val();
                var selectValor = $(this).find('.slccrit').val();
                var inputAviso = $(this).find('.graviso').val();
                var inputot = $(this).find('.grot').val();
                var inputestado = $(this).find('.grestado').val();

                formData.append('TextoSug[]', inputValor);
                formData.append('CritiSug[]', selectValor);
                formData.append('aviso[]', inputAviso);
                formData.append('ot[]', inputot);
                formData.append('estado[]', inputestado);
            });

            // Obtener el archivo seleccionado del campo de entrada de archivo
            for (let i = 1; i <= 8; i++) {
                var inputFile = $(`#fileInput${i}`)[0];
                var getFile = inputFile.files[0];
                var fieldName = inputFile.name;
                formData.append(fieldName, getFile);
            }

            for (let i = 1; i <= 4; i++) {
                var inputFile = $(`#file${i}`)[0];
                var getFile = inputFile.files[0];
                var fieldName = inputFile.name;
                formData.append(fieldName, getFile);
            }

            $.ajax({
                url: cadenaurl + ctrl + "/ajaxPostMotor", // Reemplaza 'URL_DEL_CONTROLADOR' con la URL del controlador y el método correspondiente
                type: 'POST',
                data: formData,
                processData: false, // Importante: no procesar los datos
                contentType: false, // Importante: no establecer el tipo de contenido
                dataType: 'json',
                success: function(response) {
                    // Muestra el mensaje de éxito o error
                    console.log(response);
                    window.location.href = 'https://manttomot.sdise.net/manttomot';
                    // Realiza alguna acción adicional si es necesario
                },
                error: function(xhr, status, error) {
                    // Muestra el mensaje de error
                    console.log(xhr, status, error);
                    alert('Error al enviar los datos del formulario');
                    // Realiza alguna acción adicional si es necesario
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>
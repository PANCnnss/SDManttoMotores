<?= $this->extend('layouts/layout_trab') ?>

<?= $this->section('content') ?>
<style>
  .up {
    transform: rotate(-135deg);
    -webkit-transform: rotate(-135deg);
  }
    .arrow {
    border: solid black;
    border-width: 0 3px 3px 0;
    display: inline-block;
    padding: 3px;
    margin-left: 10px;
  }
  button:focus{
    outline: none;
  }
  .button-none{
    color: none;
    background-color: inherit;
    padding: 0;
    margin:0;
    border:0;
  }
  .down {
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
  }
    .pagination-button {
        background-color: #00AAE4;
        color: #FFFFFF;
        border: none;
        padding: 8px 16px;
        font-size: 14px;
        cursor: pointer;
    }

    .pagination-button:hover {
        background-color: #00AAE4;
    }

    .pagination-button:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .pagination-current-page {
        color: #8A4D9D;
        font-size: 14px;
        margin: 0 8px;
    }

    .status-indicators {
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .status-button {
    height: 40px;
    width: 40px;
    border: none;
    border-radius: 50%;
    margin-bottom: 10px;
    margin-right: 30px; /* Agregado: margen derecho */
    display: inline-flex;
    justify-content: center;
    align-items: center;
    }

    .status-pendiente {
    background-color: #ff0000;
    color: white;
    }

    .status-iniciado {
    background-color: #00ff00;
    color: white;
    }

    .status-entregado {
    background-color: #ffff00;
    color: black;
    }

    .status-labels {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
    }

    .status-label {
    font-size: 12px;
    color: #555;
    text-align: center;
    margin: 0 10px;
    }


</style>
<?php ini_set("memory_limit","512M");?>

<div class="container-fluid">
  <h1>DASHBOARD SUPERVISOR</h1>
  <div style="text-align: center; margin-bottom:20px;">
    <div style="display: inline-block;">
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary" data-color="">Todos</button>
        <button type="button" class="btn btn-danger" data-color="#ff0000">Pendiente</button>
        <button type="button" class="btn btn-warning" data-color="#ffb22b">Iniciado</button>
        <button type="button" class="btn btn-success" data-color="#21c1d6">Entregado</button>
        <button type="button" class="btn" data-color="#008000" style="background-color:green; color:white;">Completado</button>
      </div>
    </div>
  </div>



  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Plan de Acción</h5>
          <div class="form-group">
            <input type="text" class="form-control" id="searchInput2" placeholder="Buscar...">
          </div>
          <table class="table table-hover"  id="list-mot-all">
            <tbody>
              <!-- contenido de la tabla plan de accion -->
            </tbody>
          </table>
          <div class="pagination">
            <button class="prevPage pagination-button">Anterior</button>
            <span class="currentPage pagination-current-page">1</span>
            <button class="nextPage pagination-button">Siguiente</button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Areas</h5>

          <div class="form-group">
            <input type="text" id="searchInput" class="form-control" placeholder="Ingrese término de búsqueda">
          </div>

          <table class="table table-hover" id="list-mot-atr">
            <tbody>
              <!-- Contenido tabla areas  -->
            </tbody>
          </table>
          <div class="pagination">
            <button class="anterior pagination-button">Anterior</button>
            <span class="actual pagination-current-page">1</span>
            <button class="siguiente pagination-button">Siguiente</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- GRAFICOS PARA 40°C  -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Resistencia de aislamiento 40°C</h5>
          <select id="motorSelect" class="form-control"></select>
          <center>
            <div id="scatterChart" class="chart" style="width: 650px; height: 400px; display: inline-block;"></div>
          </center>
          <div class="row">
            <div class="col">
              <!-- TABLA DATOS GRAFICO -->
              <table class="table table-sm">
                  <thead class="thead-dark">
                      <tr>
                          <th>Registros <span id="fech1"></span></th>
                          <th>Prueba 30seg</th>
                          <th>Prueba 60seg</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Resistencia de Aislamiento 15°C</td>
                          <td id="value15"></td>
                          <td id="value15_1"></td>
                      </tr>
                      <tr>
                          <td>Resistencia de Aislamiento 40°C</td>
                          <td id="value40"></td>
                          <td id="value40_1"></td>
                      </tr>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <h5 class="card-title">NUEVOS MOTORES</h5>
          </div>
          <div class="form-group">
            <input type="text" id="searchInputNew" class="form-control" placeholder="Ingrese término de búsqueda" style="margin-top:5px;">
          </div>

          <table class="table table-hover" id="list-mot-new">
            <tbody>
              <!-- Contenido tabla areas  -->
            </tbody>
          </table>
          <div class="pagination">
            <button class="anteriorNew pagination-button">Anterior</button>
            <span class="actualNew pagination-current-page">1</span>
            <button class="siguienteNew pagination-button">Siguiente</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- MODAL ACTUALIZACION REGISTROS MOTOR -->
  <div class="modal fade" id="miModal">
    <div class="modal-dialog modal-lg"> <!-- Modal grande (ancho) -->
      <div class="modal-content">
      
        <!-- Cabecera del Modal -->
        <div class="modal-header">
          <h4 class="modal-title">Completar registro del motor</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Contenido del Modal -->
        <div class="modal-body">
          <form method="POST" id="fomUpNewMot">
            <div class="modal-body">
              <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="parada">Parada</label>
                        <select name="IdPar" id="parada" class="form-control">
                            <option value="">Seleccionar</option>
                        </select>           
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="area">Area</label>
                            <input type="text" class="form-control" id="area" name="NomMot">
                        </div>
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <input type="text" class="form-control" id="marca" name="MarcaMot">
                        </div>
                        <div class="form-group">
                            <label for="serie">Serie</label>
                            <input type="text" class="form-control" id="serie" name="SerieMot">
                        </div>
                        <div class="form-group">
                            <label for="potencia">Potencia</label>
                            <input type="text" class="form-control" id="potencia" name="PotenciaMot">
                        </div>
                        <div class="form-group">
                            <label for="tension">Tension</label>
                            <input type="text" class="form-control" id="tension" name="TensionMot">
                        </div>
                        <div class="form-group">
                            <label for="hz">HZ</label>
                            <input type="text" class="form-control" id="hz" name="hzMot">
                            <input type="text" name="UsuCre" id="tecnico" class="form-control" value="<?=session()->get()["IdUsu"]?>" hidden>
                        </div>
                        <div class="form-group">
                            <label for="mel">MEL</label>
                            <input type="text" class="form-control" id="mel" name="MEL">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tag">Tag</label>
                            <input type="text" class="form-control" id="tag" name="TagMot">
                            <input type="text" class="form-control" id="idmot" name="IdMot" hidden>
                            <input type="text" class="form-control" id="idreg" name="IdReg" hidden>
                        </div>
                        <div class="form-group">
                            <label for="corriente">Corriente</label>
                            <input type="text" class="form-control" id="corriente" name="CorrienteMot">
                        </div>
                        <div class="form-group">
                            <label for="velocidad">Velocidad</label>
                            <input type="text" class="form-control" id="velocidad" name="VelocidadMot">
                        </div>
                        <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelMot">
                        </div>
                        <div class="form-group">
                            <label for="frame">Frame</label>
                            <input type="text" class="form-control" id="frame" name="frameMot">
                        </div>
                        <div class="form-group">
                            <label for="serf">SerF</label>
                            <input type="text" class="form-control" id="serf" name="fsMot">
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary onUpdate">Guardar</button>
            </div>
          </form>
        </div>
        
        
      </div>
    </div>
  </div>
  <!-- ENDMODAL  -->
  
  <!-- CARD HISTORICOS  -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
          <div class="card-body">
              <h5 class="card-title">Historico</h5>
                <div class="chart-container" style="overflow-x: auto; white-space: nowrap;">
                  <div id="dynamicCharts" class="chart" style="width: 650px; height: 400px; display: inline-block;"></div>
                </div>
          </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.2/echarts.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- OBTENER DATA PARA LA TABLA  -->
<script>
  pathArray = location.href.split('/');
  cadenaurl = pathArray[0] + "//" + pathArray[2] + "/";
  var ctrl = '<?php echo (isset($ctrl) ? $ctrl : "") ?>';

  var currentPage = 1;
  var rowsPerPage = 4; // Número de filas por página
  var data;
  var tablaOriginal; // Almacena los datos originales de la tabla

  $(document).ready(function(){
    $.ajax({
      url: cadenaurl + ctrl + "/ajaxDashSup",
      dataType: 'json',
      success: function(response) {
        // console.log(response);
        data = response;
        tablaOriginal = data.slice(); // Almacena los datos originales
        buildTable();
      },
      error: function() {
        alert('Error al obtener los datos.');
      }
    });

    function buildTable() {
      var table = $('#list-mot-atr tbody');
      var startIndex = (currentPage - 1) * rowsPerPage;
      var endIndex = startIndex + rowsPerPage;

      table.empty();

      for (var i = startIndex; i < endIndex && i < data.length; i++) {
        var row = createRow(data[i]);
        table.append(row);
      }

      updatePaginationControls();
    }

    // LISTA DESPLEGABLE
    function createRow(data) {
        var row = '<tr>';
        row += '<td> <a href="https://manttomot.sdise.net/manttomot/editar/' + data.IdReg + '" style="color:black;">' + data.NomMot + '-' + data.TagMot + '</a>';
        row += '</td>';
        
        row += '<td style="position: relative;height:60px">';
        row += '<span style="position: absolute; bottom: 0; right: 0; font-size: small; color: #999; margin-left:-190px">Fecha de ejecución '+ data.FecEjec +'</span>';
        row += '<button class="btn btn-sm btn-primary showDetails" style="background-color: transparent; border: none; padding: 0;"><i class="ti-plus" style="color: black;"></i></button>';
        row += '</td>';
        
        row += '</tr>';
        row += '<tr class="detailsRow" style="display: none;">';
        row += '<td colspan="2" class="details">';
        row += '<table class="table table-hover">';
        row += '<thead>';
        row += '<tr>';
        row += '<th>Tag Motor</th>';
        row += '<th>Pruebas 30seg</th>';
        row += '<th>Pruebas 60seg</th>';
        row += '<th>IA</th>';
        row += '</tr>';
        row += '</thead>';
        row += '<tbody>';
        row += '<tr>';
        row += '<td>' + data.TagMot + '</td>';
        row += '<td>' + data.MPru30sLectReg + '</td>';
        row += '<td>' + data.MPru60sLectReg + '</td>';
        row += '<td>' + data.MPru60sIndReg + '</td>';
        row += '</tr>';
        row += '</tbody>';
        row += '</table>';
        row += '<table class="table table-hover">';
        row += '<thead>';
        row += '<tr>';
        row += '<th>Plan de Acción</th>';
        row += '</tr>';
        row += '</thead>';
        row += '<tbody>';
        // Verifica si hay datos en datos_concatenados
        if (data.datos_concatenados) {
            var datosArray = data.datos_concatenados.split(',');
            for (var i = 0; i < datosArray.length; i++) {
                row += '<tr>';
                row += '<td>' + datosArray[i].trim() + '</td>';
                row += '</tr>';
            }
        } else {
            // Si no hay datos en datos_concatenados, muestra "Sin plan de acción requerido"
            row += '<tr>';
            row += '<td>Sin plan de acción requerido</td>';
            row += '</tr>';
        }

        row += '</tbody>';
        row += '</table>';
        row += '</td>';
        row += '</tr>';

        return row;
    }


    // PAGINACION DE PAGINA
    function updatePaginationControls() {
      var totalPages = Math.ceil(data.length / rowsPerPage);
      var prevButton = $('.anterior');
      var nextButton = $('.siguiente');
      var currentPageSpan = $('.actual');

      prevButton.prop('disabled', currentPage === 1);
      nextButton.prop('disabled', currentPage === totalPages);

      currentPageSpan.text(currentPage + ' / ' + totalPages);
    }

    $('.anterior').on('click', function () {
      if (currentPage > 1) {
        currentPage--;
        buildTable();
      }
    });

    $('.siguiente').on('click', function () {
      var totalPages = Math.ceil(data.length / rowsPerPage);
      if (currentPage < totalPages) {
        currentPage++;
        buildTable();
      }
    });

    // Escucha los cambios en el campo de búsqueda y filtra los resultados
    $('#searchInput').on('input', function () {
      var consulta = $(this).val().toLowerCase();

      // Filtra los resultados en función de la consulta
      data = tablaOriginal.filter(function (item) {
        var texto = (item.NomMot + '-' + item.TagMot).toLowerCase();
        return texto.includes(consulta);
      });

      currentPage = 1;
      buildTable();
    });

    // Gestiona el despliegue de detalles
    $('#list-mot-atr').on('click', '.showDetails', function() {
      var detailsRow = $(this).closest('tr').next('.detailsRow');
      detailsRow.slideToggle();
      var icon = $(this).find('i');
      icon.toggleClass('ti-plus ti-minus');
    });
  });
</script>

<!-- configuracion tabla nuevos motores  -->
<script>
  var currentPageNew = 1;
  var rowsPerPageNew = 4;
  var dataNew;
  var tablaOriginalNew; // Almacena los datos originales de la tabla

  $(document).ready(function(){
    $.ajax({
      url: cadenaurl + ctrl + "/ajaxNewMot", // Cambia la URL a la correspondiente para la nueva tabla
      dataType: 'json',
      success: function(response) {
        console.log("hola "+response);
        dataNew = response;
        tablaOriginalNew = dataNew.slice(); // Almacena los datos originales
        buildTableNew();
      },
      error: function() {
        alert('Error al obtener los datos.');
      }
    });

    function buildTableNew() {
      var tableNew = $('#list-mot-new tbody'); // Cambia el selector al correspondiente a la nueva tabla
      var startIndexNew = (currentPageNew - 1) * rowsPerPageNew;
      var endIndexNew = startIndexNew + rowsPerPageNew;

      tableNew.empty();

      for (var i = startIndexNew; i < endIndexNew && i < dataNew.length; i++) {
        var rowNew = createRowNew(dataNew[i]);
        tableNew.append(rowNew);
      }

      updatePaginationControlsNew();
    }


    // LISTA DESPLEGABLE
    function createRowNew(data) {
      openModalWithData(data);
      var row = '<tr>';
      // row += '<td><a href="#" data-toggle="modal" data-target="#miModal">'  + data.PotenciaMot + '-' + data.frameMot + '</a>';
      row += '<td><a href="#" onclick="openModalWithData(' + JSON.stringify(data) + ')" data-toggle="modal" data-target="#miModal">'  + data.PotenciaMot + '-' + data.frameMot + '</a>';
      row += '</td>';
      
      row += '<td style="position: relative;height:60px">';
      row += '<span style="position: absolute; bottom: 0; right: 0; font-size: small; color: #999; margin-left:-190px">Fecha de ejecución '+ data.FecCre +'</span>';
      row += '<button class="btn btn-sm btn-primary showDetailsNew" style="background-color: transparent; border: none; padding: 0;"><i class="ti-plus" style="color: black;"></i></button>';
      row += '</td>';
      
      row += '</tr>';
      row += '<tr class="detailsRowNew" style="display: none;">';
      row += '<td colspan="2" class="details">';
      row += '<table class="table table-hover">';
      row += '<thead>';
      row += '<tr>';
      row += '<th>Serie Motor</th>';
      row += '<th>Marca</th>';
      row += '<th>Tension</th>';
      row += '</tr>';
      row += '</thead>';
      row += '<tbody>';
      row += '<tr>';
      row += '<td>' + data.SerieMot + '</td>';
      row += '<td>' + data.MarcaMot + '</td>';
      row += '<td>' + data.TensionMot + '</td>';
      row += '</tr>';
      row += '</tbody>';
      row += '</table>';
      row += '</td>';
      row += '</tr>';

      return row;
    }

    function openModalWithData(data) {
      // console.log("hola"+data.MarcaMot);
      $('#area').val(data.NomMot);
      $('#tag').val(data.TagMot);

      $('#marca').val(data.MarcaMot);
      $('#corriente').val(data.CorrienteMot);
      $('#serie').val(data.SerieMot);
      $('#velocidad').val(data.VelocidadMot);
      $('#potencia').val(data.PotenciaMot);
      $('#modelo').val(data.modelMot);
      $('#tension').val(data.TensionMot);
      $('#frame').val(data.frameMot);
      $('#hz').val(data.hzMot);
      $('#serf').val(data.fsMot);

      $('#idmot').val(data.IdMot);
      $('#idreg').val(data.IdReg);

      // // Abre el modal
      // $('#miModal').modal('show');
    }

    function updatePaginationControlsNew() {
      var totalPagesNew = Math.ceil(dataNew.length / rowsPerPageNew);
      var prevButtonNew = $('.anteriorNew'); // Cambia el selector si es necesario
      var nextButtonNew = $('.siguienteNew'); // Cambia el selector si es necesario
      var currentPageSpanNew = $('.actualNew'); // Cambia el selector si es necesario

      prevButtonNew.prop('disabled', currentPageNew === 1);
      nextButtonNew.prop('disabled', currentPageNew === totalPagesNew);

      currentPageSpanNew.text(currentPageNew + ' / ' + totalPagesNew);
    }

    $('.anteriorNew').on('click', function () {
      if (currentPageNew > 1) {
        currentPageNew--;
        buildTableNew();
      }
    });

    $('.siguienteNew').on('click', function () {
      var totalPagesNew = Math.ceil(dataNew.length / rowsPerPageNew);
      if (currentPageNew < totalPagesNew) {
        currentPageNew++;
        buildTableNew();
      }
    });

    // Escucha los cambios en el campo de búsqueda y filtra los resultados
    $('#searchInputNew').on('input', function () {
      var consultaNew = $(this).val().toLowerCase();

      // Filtra los resultados en función de la consulta
      dataNew = tablaOriginalNew.filter(function (item) {
        var textoNew = (item.ot + '-' + item.aviso).toLowerCase(); // Cambia los campos a los correspondientes en la nueva tabla
        return textoNew.includes(consultaNew);
      });

      currentPageNew = 1;
      buildTableNew();
    });

    // Gestiona el despliegue de detalles en la nueva tabla
    $('#list-mot-new').on('click', '.showDetailsNew', function() {
      var detailsRowNew = $(this).closest('tr').next('.detailsRowNew');
      detailsRowNew.slideToggle();
      var iconNew = $(this).find('i');
      iconNew.toggleClass('ti-plus ti-minus');
    });
  });

</script>

<!-- configuracion paginacion tablas -->
<script>
    $(document).ready(function () {
        var rowsPerPage = 3; // Número de filas por página
        var currentPage = 1;
        var data; // Almacena los datos originales de la tabla
        var filteredData; // Almacena los datos filtrados por la búsqueda

        // Función para construir la tabla con los datos proporcionados
        function buildTable() {
            var table = $('#list-mot-all tbody');
            var startIndex = (currentPage - 1) * rowsPerPage;
            var endIndex = startIndex + rowsPerPage;

            table.empty();

            for (var i = startIndex; i < endIndex && i < filteredData.length; i++) {
                var rowPair = createRowPair(filteredData[i]);
                table.append(rowPair);
            }

            updatePaginationButtons();
        }

        function createRowPair(rowData) {
            var rowPair = '<tr class="row-link">';
            rowPair += '<td style="position: relative;" data-id-reg="' + rowData.IdReg + '">';
            rowPair += '<input type="hidden" name="" value="' + rowData.UsuTecAsig + '" id="idtec' + rowData.IdReg + '">';
            rowPair += '<a href="https://manttomot.sdise.net/manttomot/editar/' + rowData.IdReg + '" class="table-link" style="color: black;">' + rowData.NomMot + ' - ' + rowData.TagMot + '</a>';
            rowPair += '<i class="fas fa-square filterable" data-estado="' + rowData.EstReg + '" style="margin-left:5px;"></i>';
            rowPair += '<span id="pbusc" hidden>' + rowData.NomMot + ' - ' + rowData.TagMot + '</span>';
            
            var today = new Date().toISOString().split('T')[0]; // Obtén la fecha actual en formato ISO (YYYY-MM-DD)
            var fechaCreacion = rowData.FecCre.split(' ')[0]; // Obtén la fecha de creación del registro
            var diff = Math.floor((Date.parse(today) - Date.parse(fechaCreacion)) / 86400000); // Calcula la diferencia en días
            rowPair += '<span style="position: absolute; bottom: 0; right: 0; font-size: small; color: #999;">Fecha creación hace ' + diff + ' días</span><br>';
            
            // Etiqueta adicional en el margen superior derecho
            rowPair += '<label for="selectAsig' + rowData.IdReg + '" style="margin-left:20px;">Asignar a técnico:</label>';
            rowPair += '<select id="selectAsig' + rowData.IdReg + '" class="select-asig form-control" style="width: 50%;margin-left:25px;" class="form-control form-control-sm">';
            rowPair += '<option value="">Ninguno</option>';
            rowPair += '<option value="1" ' + (rowData.UsuTecAsig === '1' ? 'selected' : '') + '>TECNICO 1</option>';
            rowPair += '<option value="2" ' + (rowData.UsuTecAsig === '2' ? 'selected' : '') + '>SUPERVISOR 1</option>';
            rowPair += '<option value="3" ' + (rowData.UsuTecAsig === '3' ? 'selected' : '') + '>ADMIN 1</option>';
            rowPair += '<option value="4" ' + (rowData.UsuTecAsig === '4' ? 'selected' : '') + '>AIGNER VIDAL CANAZA PRADO </option>';
            rowPair += '</select>';




            rowPair += '<button id="btn-info' + rowData.IdReg + '" class="button-none" style="position: absolute; margin-top: -55px; right: 0;">';
            rowPair += '<p><i id="arrow-info' + rowData.IdReg + '" class="ti-plus"></i></p>';
            rowPair += '</button>';
            rowPair += '</td>';
            rowPair += '</tr>';
            
            rowPair += '<tr id="extraInputRow' + rowData.IdReg + '" class="extra-info-row" style="display: none !important;">';
            rowPair += '<td colspan="5">';
            rowPair += '<table id="table-info' + rowData.IdReg + '" style="display: none;" class="table table-hover">';
            rowPair += '<tbody>';
            rowPair += '<tr>';
            rowPair += '<th colspan="2">Nombre</th>';
            rowPair += '<th>Tag</th>';
            rowPair += '<th>Marca</th>';
            rowPair += '<th>Serie</th>';
            rowPair += '</tr>';
            rowPair += '<tr>';
            rowPair += '<td colspan="2">' + rowData.NomMot + '</td>';
            rowPair += '<td>' + rowData.TagMot + '</td>';
            rowPair += '<td>' + rowData.MarcaMot + '</td>';
            rowPair += '<td>' + rowData.SerieMot + '</td>';
            rowPair += '</tr>';
            rowPair += '<tr>';
            rowPair += '<th>Plan de Acción</th>';
            rowPair += '<th>OT</th>';
            rowPair += '<th>Aviso</th>';
            rowPair += '</tr>';
            
            if (rowData.datos_concatenados && rowData.datos_concatenados.length > 0) {
                var datosArray = rowData.datos_concatenados.split(',');
                var otArray = rowData.OT ? rowData.OT.split(',') : [];
                var avisosArray = rowData.avisos ? rowData.avisos.split(',') : [];
                // console.log(otArray);

                for (var i = 0; i < datosArray.length; i++) {
                    rowPair += '<tr><td>' + datosArray[i].trim() + '</td>';
                    rowPair += '<td>' + (otArray[i] ? otArray[i].trim() : '') + '</td>';
                    rowPair += '<td>' + (avisosArray[i] ? avisosArray[i].trim() : '') + '</td>';
                    rowPair += '</tr>'
                }
            } else {
                rowPair += '<tr><td colspan="5">Sin plan de acción requerido</td></tr>';
            }
            
            rowPair += '</tbody>';
            rowPair += '</table>';
            rowPair += '</td>';
            rowPair += '</tr>';

            return rowPair;
        }


        // Función para actualizar los botones de paginación
        function updatePaginationButtons() {
            var totalPages = Math.ceil(filteredData.length / rowsPerPage);
            var prevButton = $('.prevPage');
            var nextButton = $('.nextPage');
            var currentPageLabel = $('.currentPage');

            prevButton.prop('disabled', currentPage === 1);
            nextButton.prop('disabled', currentPage === totalPages);

            currentPageLabel.text(currentPage + ' / ' + totalPages);
        }

        // Manejador de evento para el botón "Anterior"
        $('.pagination').on('click', '.prevPage', function() {
            if (currentPage > 1) {
                currentPage--;
                buildTable();
                applyColorsToFilterableElements();
            }
        });

        // Manejador de evento para el botón "Siguiente"
        $('.pagination').on('click', '.nextPage', function() {
            var totalPages = Math.ceil(filteredData.length / rowsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                buildTable();
                applyColorsToFilterableElements();
            }
        });

        $('#searchInput2').on('input', function () {
            var searchTerm = $(this).val().toLowerCase();

            // Filtrar los datos en función del término de búsqueda
            filteredData = data.filter(function (rowData) {
                var rowText = (rowData.NomMot + '-' + rowData.TagMot).toLowerCase();
                return rowText.includes(searchTerm);
            });

            currentPage = 1;
            rowsPerPage = Math.min(filteredData.length, 3);
            var totalPages = Math.ceil(filteredData.length / rowsPerPage);

            updatePaginationButtons();

            buildTable();
            applyColorsToFilterableElements();

        });

        data = <?php echo json_encode($data); ?>;
        filteredData = data.slice(); // Inicialmente, los datos filtrados son iguales a los originales
        buildTable();

        // Función para aplicar colores a elementos con clase .filterable
        function applyColorsToFilterableElements() {
            $('.filterable').each(function() {
                var estado = $(this).data('estado');
                var color = '';

                switch (estado) {
                    case 0:
                        color = 'red';
                        break;
                    case 1:
                        color = '#ffb22b';
                        break;
                    case 2:
                        color = '#21c1d6';
                        break;
                    case 3:
                        color = '#008000';
                        break;
                    default:
                        color = 'black';
                        break;
                }

                $(this).css('color', color);
            });
        }
    });

    // Agregar un controlador de eventos para los botones de información
    $(document).on('click', '[id^="btn-info"]', function() {
        var id = this.id.replace('btn-info', '');
        var $extraRow = $('#extraInputRow' + id);
        var $tableInfo = $('#table-info' + id);
        var $arrowInfo = $('#arrow-info' + id);

        if ($extraRow.is(':hidden')) {
            $extraRow.show();
            $tableInfo.show();
            $arrowInfo.removeClass('ti-plus').addClass('ti-minus');
        } else {
            $extraRow.hide();
            $tableInfo.hide();
            $arrowInfo.removeClass('ti-minus').addClass('ti-plus');
        }
    });

</script>

<!-- configuracion select2 y grafico -->
<script>
  $(document).ready(function() {
    var motors = <?php echo json_encode($data3); ?>;
    var dynamicCharts = []; // Almacenar gráficos dinámicos

    var selectData = motors.map(function(motor) {
      var text = motor.TagMot;
      return { id: motor.IdReg, text: text };
    });

    var select = $('#motorSelect');
    select.select2({
      data: selectData,
      placeholder: 'Seleccione un motor',
      allowClear: true
    });

    var chart = echarts.init($('#scatterChart')[0]);

    // Función para actualizar el gráfico principal
    function updateChart(selectedMotorId) {
      var selectedMotorText = $('#motorSelect option:selected').text(); // Obtiene el texto seleccionado

      // Busca un motor que coincida exactamente con el texto seleccionado en el campo TagMot
      var matchingMotor = motors.find(function(motor) {
        return motor.TagMot === selectedMotorText;
      });

      var selectedMotorData = motors.find(function(motor) {
        return motor.IdReg === selectedMotorId;
      });

      var yAxisData = [selectedMotorData.MPru30sLectReg, selectedMotorData.MPru60sLectReg];

      var additionalData = yAxisData.map(function(value) {
        var multipliedValue = value * 0.176776695;
        return Number(multipliedValue.toFixed(2));
      });

      document.getElementById('value15').textContent = yAxisData[0];
      document.getElementById('fech1').textContent = selectedMotorData.FecEjec;
      document.getElementById('value15_1').textContent = yAxisData[1];
      document.getElementById('value40').textContent = additionalData[0];
      document.getElementById('value40_1').textContent = additionalData[1];

      var option = {
        xAxis: {
          type: 'category',
          data: ['Pruebas 30seg', 'Pruebas 60seg'],
          axisLine: {
            onZero: false 
          },
          splitLine: {
            show: true
          },
        },
        yAxis: {
          type: 'value',
          axisLine: {
            onZero: true
          },
          splitLine: {
            show: true
          },
          axisPointer: {
            show: true,
            type: 'line'
          }
        },
        legend: {
          data: ['Resistencia de Aislamiento 15°C', 'Resistencia de Aislamiento 40°C'],
        },
        tooltip: {
          trigger: 'axis',
          formatter: function(params) {
            var table = '<table style="width:100%">';
            table += '<tr><th>Serie</th><th>Valor</th></tr>';
            
            for (var i = 0; i < params.length; i++) {
              var param = params[i];
              table += '<tr><td>' + param.seriesName + '</td><td>' + param.value + '</td></tr>';
            }
            table += '</table>';
            return table;
          }
        },
        series: [
          {
            name: 'Resistencia de Aislamiento 15°C',
            type: 'line',
            data: yAxisData,
            markLine: {
              data: [
                {
                  yAxis: 0.9, 
                  label: {
                    show: true,
                    position: 'start',
                    formatter: 'Peligro'
                  },
                  lineStyle: {
                    type: 'dashed', // Puedes ajustar el tipo de línea (ejemplo: 'dashed', 'dotted', 'solid', etc.)
                    color: 'red', 
                    width: 2 
                  }
                }
              ]
            }
          },
          {
            name: 'Resistencia de Aislamiento 40°C',
            type: 'line',
            data: additionalData,
            lineStyle: {
              type: 'dashed',
              color: 'red',
              width: 2,
              symbol: ['cross', 'cross'],
              symbolSize: 8
            },
          }
        ]
      };

      chart.setOption(option);
    }

    function addDynamicCharts(matchingMotors) {
      console.log("encontramos"+matchingMotors.length);
      dynamicCharts.forEach(function(chart) {
        chart.dispose();
      });
      dynamicCharts = [];

      var dynamicChartsContainer = $('#dynamicCharts');
      dynamicChartsContainer.empty();

      matchingMotors.forEach(function(matchingMotor) {
          var chartContainer = $('<div class="chart" style="width: 650px; height: 400px; display: inline-block;"></div>');
          dynamicChartsContainer.append(chartContainer);
          
          var chart = echarts.init(chartContainer[0]);
          dynamicCharts.push(chart);

          var yAxisData = [matchingMotor.MPru30sLectReg, matchingMotor.MPru60sLectReg];
          var additionalData = yAxisData.map(function(value) {
            var multipliedValue = value * 0.176776695;
            return Number(multipliedValue.toFixed(2));
          });


          var option = {
            xAxis: {
              type: 'category',
              data: ['Pruebas 30seg', 'Pruebas 60seg'],
              axisLine: {
                onZero: false 
              },
              splitLine: {
                show: true
              },
            },
            yAxis: {
              type: 'value',
              axisLine: {
                onZero: true
              },
              splitLine: {
                show: true
              },
              axisPointer: {
                show: true,
                type: 'line'
              }
            },
            legend: {
              data: ['Resistencia de Aislamiento 15°C', 'Resistencia de Aislamiento 40°C'],
            },
            // tooltip: {
            //   trigger: 'axis',
            //   formatter: function(params) {
            //     var table = '<table style="width:100%">';
            //     table += '<tr><th>Serie</th><th>Valor</th></tr>';
                
            //     for (var i = 0; i < params.length; i++) {
            //       var param = params[i];
            //       table += '<tr><td>' + param.seriesName + '</td><td>' + param.value + '</td></tr>';
            //     }
            //     table += '</table>';
            //     return table;
            //   }
            // },
            series: [
              {
                name: 'Resistencia de Aislamiento 15°C',
                type: 'line',
                data: yAxisData,
                markLine: {
                  data: [
                    {
                      yAxis: 0.9, 
                      label: {
                        show: true,
                        position: 'start',
                        formatter: 'Peligro'
                      },
                      lineStyle: {
                        type: 'dashed', // Puedes ajustar el tipo de línea (ejemplo: 'dashed', 'dotted', 'solid', etc.)
                        color: 'red', 
                        width: 2 
                      }
                    }
                  ]
                }
              },
              {
                name: 'Resistencia de Aislamiento 40°C',
                type: 'line',
                data: additionalData,
                lineStyle: {
                  type: 'dashed',
                  color: 'red',
                  width: 2,
                  symbol: ['cross', 'cross'],
                  symbolSize: 8
                },
              }
            ]
          };
          chart.setOption(option);
        // }
      });
    }

    select.on('change', function() {
      var selectedMotorId = $(this).val();
      updateChart(selectedMotorId);
      
      // Busca las coincidencias de motor
      var selectedMotorText = $('#motorSelect option:selected').text();
      var matchingMotors = motors.filter(function(motor) {
        return motor.TagMot === selectedMotorText;
      });
      // console.log(matchingMotors);

      // Si hay coincidencias, agrega gráficos dinámicos
      if (matchingMotors.length >= 1) {
        $("#table-comp").show();
        addDynamicCharts(matchingMotors);
      } else {
        $("#table-comp").hide();
        dynamicCharts.forEach(function(chart) {
          chart.dispose();
        });
        dynamicCharts = [];
      }
    });

    var selectedMotorId = select.val();
    if (selectedMotorId) {
      updateChart(selectedMotorId);
      // newChart(selectedMotorId);
    }
  });
</script>

<!-- Select para asignacion de usuario -->
<script>
    $(document).ready(function () {
      $.ajax({
          url: cadenaurl + ctrl + "/filtroUsuarios",
          method: 'GET',
          dataType: 'json',
          success: function (data) {
              var selectUsuarios = $('.select-asig');

              // Limpia el select actual (excepto el primer option)
              selectUsuarios.find('option:not(:first)').remove();

              $.each(data, function (index, usuario) {
                  selectUsuarios.append($('<option>', {
                      value: usuario.IdUsu,
                      text: usuario.NomUsu
                  }));
              });

              compararYSeleccionarValores();
          },
          error: function () {
              // Ocurrió un error en la solicitud AJAX
              console.error('Error en la solicitud AJAX');
          }
      });

      function compararYSeleccionarValores() {
          $('[id^="idtec"]').each(function() {
              var input = $(this);
              var selectId = 'selectAsig' + input.attr('id').replace('idtec', '');
              var inputValue = input.val();
              var select = $('#' + selectId);

              select.find('option').each(function() {
                  var option = $(this);

                  if (option.val() === inputValue) {
                      option.prop('selected', true);
                  }
              });
          });
      }
  });

  $(document).on('change', 'select[id^="selectAsig"]', function () {
      var selectedValue = $(this).val();
      var idReg = $(this).attr('id').replace('selectAsig', ''); 


      Swal.fire({
        title: "Usted desea asignar el levantamiendo de plan de accion?",
        text: "Por favor, confirme la asignacion",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Deseo continuar !",
        cancelButtonText: "Cancelar",
      }).then((result) => {
        if (result.value)
          $.ajax({
            url: cadenaurl + ctrl + "/updregasig", 
            method: 'POST',
            data: {
                idReg: idReg,
                selectedValue: selectedValue
            },
            dataType: 'json',
            success: function (response) {
                console.log('Respuesta del servidor:', response);
            },
            error: function () {
                console.error('Error en la solicitud AJAX');
            }
          });
      });
  });
</script>

<!-- Configuracion de color de los enlaces  -->
<script>
  $(document).ready(function() {
    $('i').each(function() {
        var estado = $(this).data('estado');
        var color = '';

        switch (estado) {
            case 0:
                color = 'red';
                break;
            case 1:
                color = '#ffb22b';
                break;
            case 2:
                color = '#21c1d6';
                break;
            case 3:
                color = '#008000';
                break;
            default:
                color = 'black';
                break;
        }

        $(this).css('color', color);
    });
  });

  $(document).ready(function() {
    $('.btn').click(function() {
      var colorFilter = $(this).data('color');
      // console.log('Filtro de color enviado:', colorFilter);
      
      if (colorFilter === '') {
        $('.filterable').parent().show();
      } else {
        $('.filterable').each(function() {
          var tdColor = $(this).css('color');
          var hexColor = rgbToHex(tdColor);
          // console.log('Color de la etiqueta <a>:', hexColor);

          if (hexColor === colorFilter) {
            $(this).parent().show();
          } else {
            $(this).parent().hide();
          }
        });
      }
    });
  });

  // Función para convertir un color RGB a hexadecimal
  function rgbToHex(rgb) {
    var match = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    if (match) {
      return "#" + ((1 << 24) | (match[1] << 16) | (match[2] << 8) | match[3]).toString(16).slice(1);
    } else {
      return rgb;
    }
  }

</script>

<script>
    $(document).ready(function() {
        $('.extra-info-row').css('display', 'none');
    });

</script>

<script>
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
</script>

<!-- POST UPdate NEW MOT  -->
<script>
  $(document).ready(function() {
    $('#fomUpNewMot').submit(function(event) {
        event.preventDefault(); 

        var formData = new FormData(this); 

        $.ajax({
            type: 'POST',
            url: cadenaurl + ctrl + "/ajaxUpdateNewMot",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(xhr, status, error);
            }
        });
    });
  });

  $('.onUpdate').on('click', function() {
      var reg = $('#idreg').val();
      // console.log(reg);
      var fechaActual = new Date().toISOString().slice(0, 10);
      var idUsu = <?php echo json_encode(session()->get("IdUsu")); ?>;

      var formData = new FormData();
      formData.append('idReg', reg);
      formData.append('fechaActual', fechaActual);
      formData.append('idUsu', idUsu);
      formData.append('descripcion', "Completado los datos del motor");

      $.ajax({
          url: cadenaurl + ctrl + "/ajaxNotificationPostSup",
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
</script>
<?= $this->endSection() ?>
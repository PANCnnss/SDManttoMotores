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

<div class="container-fluid">
  <h1>DASHBOARD TECNICO</h1>
  
  <div class="row">  
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tareas Asignadas</h5>
          <div class="form-group">
            <input type="text" id="searchInput" class="form-control" placeholder="Ingrese término de búsqueda">
          </div>

          <table class="table table-hover" id="list-asig-atr">
            <tbody>
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

</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- OBTENER DATA PARA LA TABLA  -->
<script>
  pathArray = location.href.split('/');
  cadenaurl = pathArray[0] + "//" + pathArray[2] + "/";
  var ctrl = '<?php echo (isset($ctrl) ? $ctrl : "") ?>';

  var currentPage = 1;
  var rowsPerPage = 4;
  var data;
  var tablaOriginal; // Almacena los datos originales de la tabla

  $(document).ready(function(){

    function fetchData() {
      $.ajax({
        url: cadenaurl + ctrl + "/ajaxAsig",
        dataType: 'json',
        success: function(response) {
          mostrarNotificacion();
          
          console.log(response);
          data = response;
          tablaOriginal = data.slice(); // Almacena los datos originales
          buildTable();
        },
        error: function() {
          alert('Error al obtener los datos.');
        }
      });
    }

    // Función para mostrar una notificación
    function mostrarNotificacion() {
        Swal.fire({
            title: 'Nueva asignación pendiente',
            text: 'Tienes una nueva asignación pendiente de revisión.',
            icon: 'info',
            confirmButtonText: 'Aceptar'
        });
    }

    // Llama a fetchData inicialmente y luego cada 5 segundos
    fetchData(); // Llama a la función inicialmente
    // setInterval(fetchData, 10000);


    function buildTable() {
      var table = $('#list-asig-atr tbody');
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
        // row += '<td> <a href="https://manttomot.sdise.net/manttomot/editar/' + data.IdReg + '">' + data.NomMot + '-' + data.TagMot + '</a></td>';
        row += '<td>';
        row += '<a href="https://manttomot.sdise.net/manttomot/editar/' + data.IdReg + '">' + data.NomMot + '-' + data.TagMot + '</a>';
        if (data.UsuTecAsig !== null && data.UsuTecAsig !== '') {
            row += '<span style="margin-left:10px;">Levantamiento Plan de Accion</span>';
        } else {
            row += '<span style="margin-left:10px;">Completar registro</span>';
        }
        if (data.EstReg === 3) {
            row += '<span class="tu-clase">'+ data.EstReg +'</span>';
        }

        row += '</td>';

        // row += '<td><button class="btn btn-sm btn-primary showDetails" style="background-color: transparent; border: none; padding: 0;"><i class="ti-plus" style="color: black;"></i></button></td>';
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
        row += '<th>Nombre</th>';
        row += '<th>TAG</th>';
        row += '<th>Marca</th>';
        row += '<th>Serie</th>';
        row += '</tr>';
        row += '</thead>';
        row += '<tbody>';
        row += '<tr>';
        row += '<td>' + data.NomMot + '</td>';
        row += '<td>' + data.TagMot + '</td>';
        row += '<td>' + data.MarcaMot + '</td>';
        row += '<td>' + data.SerieMot + '</td>';
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
    $('#list-asig-atr').on('click', '.showDetails', function() {
      var detailsRow = $(this).closest('tr').next('.detailsRow');
      detailsRow.slideToggle();
      var icon = $(this).find('i');
      icon.toggleClass('ti-plus ti-minus');
    });
  });
</script>
<?= $this->endSection() ?>

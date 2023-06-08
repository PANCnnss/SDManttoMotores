<?= $this->extend('layouts/layout_trab') ?>

<?= $this->section('css') ?>

<style>
  .dz-image-preview {
    background-color: black;
  }
</style>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php use App\Libraries\PrintForm; 
// var_dump($dtreg);
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-12">
      <!-- Encabezado -->
      <div class="card">
        <form class="needs-validation" id="fliq" novalidate method="post">
          <div class="card-body">
            <?php PrintForm::printFormCard($inpreg, (isset($dtreg) ? $dtreg : null)); ?>
            <div class="card">
                <!-- Formulario 1 -->
                <div class="card-body">
                    <div class="form-group form-check form-check-inline">
                        <input type="checkbox" name="checkbox1" id="checkbox1" class="form-check-input">
                        <label class="form-check-label" for="checkbox1">Solicitud pruebas de Resistencia de Aislamiento</label>
                    </div>
                    <div class="form-group form-check form-check-inline">
                        <input type="checkbox" name="checkbox2" id="checkbox2" class="form-check-input">
                        <label class="form-check-label" for="checkbox2">Solicitud pruebas de resistencia Ohmica</label>
                    </div>
                    <div class="form-group form-check form-check-inline">
                        <input type="checkbox" name="checkbox3" id="checkbox3" class="form-check-input">
                        <label class="form-check-label" for="checkbox3">Solicitud torque de pernos</label>
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
        </form>
      </div>

      <div class="card" id="card1" style="display: none;">
        <div class="card-body">

          <!-- Formulario 1 -->
              <h3>LECTURA DE RESISTENCIA DE AISLAMIENTO A TIERRA (ESTATOR)</h3>
              <form id="formMegometro">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="megohmetro">Megóhmetro Megabras:</label>
                              <input type="text" name="megohmetro" id="megohmetro" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="serie">Serie:</label>
                              <input type="text" name="serie" id="serie" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="tiempo_prueba">Tiempo de prueba:</label>
                              <input type="text" name="tiempo_prueba" id="tiempo_prueba" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="tension_prueba">Tensión de Prueba:</label>
                              <input type="text" name="tension_prueba" id="tension_prueba" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="temperatura_ambiente">Temperatura ambiente:</label>
                              <input type="text" name="temperatura_ambiente" id="temperatura_ambiente" class="form-control">
                          </div>
                      </div>
                  </div>

                  <h5>DATOS DE PRUEBA CON EL MEGOMETRO</h5>
                  <button class="btn btn-sm btn-secondary" type="button" data-toggle="collapse" data-target="#tablaMegometro" aria-expanded="false" aria-controls="tablaMegometro">
                      Desplegar/ocultar tabla
                  </button>
                  <div class="collapse mt-3" id="tablaMegometro">
                      <table class="table">
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
                                  <td><input type="text" name="tiempo1" class="form-control" value="1"></td>
                                  <td><input type="text" name="lectura1" class="form-control"></td>
                                  <td><input type="text" name="indice1" class="form-control"></td>
                                  <td rowspan="1"><textarea name="observaciones" class="form-control"></textarea></td>
                              </tr>
                              <tr>
                                  <td><input type="text" name="tiempo2" class="form-control"></td>
                                  <td><input type="text" name="lectura2" class="form-control"></td>
                                  <td><input type="text" name="indice2" class="form-control"></td>
                                  <td rowspan="1"><textarea name="observaciones" class="form-control"></textarea></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </form>
          </div>
      </div>

      <div class="card" id="card2" style="display: none;">
          <!-- Formulario 2 -->
          <div class="card-body">
              <h3>LECTURA DE MEDIDA DE RESISTENCIA ÓHMICA - ESTATOR</h3>
              <form id="formMicrohmetro">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="microhmetro">Microhmímetro Metrel:</label>
                              <input type="text" name="microhmetro" id="microhmetro" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="cert_calibracion">N° Cert. Calibración:</label>
                              <input type="text" name="cert_calibracion" id="cert_calibracion" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="temperatura_ambiente">Temperatura ambiente:</label>
                              <input type="text" name="temperatura_ambiente" id="temperatura_ambiente" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="conexion_prueba">Conexión de prueba:</label>
                              <input type="text" name="conexion_prueba" id="conexion_prueba" class="form-control">
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>

      <div class="card" id="card3" style="display: none;">
        <!-- Formulario 3 -->
        <h3>Formulario 3</h3>
        <form id="form3">
            <div class="form-group">
                <label for="fecha">Fecha de nacimiento:</label>
                <input type="date" name="fecha" id="fecha" class="form-control">
            </div>
            <div class="form-group">
                <label for="genero">Género:</label>
                <select name="genero" id="genero" class="form-control">
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
        </form>
      </div>


    </div>
  </div>

  <!-- <div id="mitems" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="milabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center" novalidate>
          <h3 class="modal-title" id="milabel">Item</h3>
          <button type="button" class="close ml-auto" data-dismiss="modal">x</button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
              <a href="#tab1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                <span class="d-none d-lg-block">Datos</span>
              </a>
            </li>
            <li class="nav-item" id="nigimg">
              <a href="#tab2" data-toggle="tab" aria-expanded="true" class="nav-link">
                <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                <span class="d-none d-lg-block">Imágenes</span>
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane show active" id="tab1">
              <form id="fitems" class="needs-validation form-horizontal">
                <?php PrintForm::printFormCard($inpper, (isset($dtreg) ? null : null)); ?>
              </form>
            </div>
          </div>
          <div class="tab-pane" id="tab2" style="overflow: scroll;">
            <div class="row">
              <div class="col-12">
                <div id="iddrop" disabled class="dropzone"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" form="fitems" id="sitems" class="btn btn-success">Guardar</button>
      </div>
    </div>
  </div> -->
</div>
<?= $this->endSection() ?>
<?= $this->section('js') ?>

<script>
  // DROPZONE
  Dropzone.autoDiscover = false;
  var ref, ref2; //global para eliminar archivo
  //  Validacion
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
  //   Items
  $("#fitems").on('submit', function(e) {
    if (this.checkValidity && !this.checkValidity()) return;
    e.preventDefault();
    f = $(document).find("#fitems")
    if (!f.valid()) return; //Si no es valida no hacer nada
    dser = f.serializeArray();
    sd = {}
    dser.forEach(v => {
      sd[v.name] = v.value
    });
    sajax("ajaxieditar", sd, false, true) //recargar para mostrar datos totales
  });
  $("#btitems").on("click", () => { //Nuevo item
    f = $("#fitems") //reset form
    f[0].reset()
    $("#CostItem").val(0)
    $("#CostdItem").val(0)
    $("#btgimg").toggle(false); //Ocultar boton de guardar imagenes
    $("#nigimg").toggle(false); //Ocultar tab con dropzone
    $("#mitems").modal()
  })

  function edititem(id) {
    f = $("#fitems") //Reload form with data
    fajax("ajaxiver", {
      id: id
    }, (dt) => {
      d = dt.data
      setopt("IdPres", dt.pdt) //Actualizar las opciones del select
      // console.log(dt.lf); //Lista Files
      for (i in d) { //Por cada dato
        // console.log("El", i, d[i]);
        f.find("#" + i).val(d[i])
      }
      dpz.url = cadenaurl + ctrl + "/upload/" + id

      //Mostrar archivos cargados
      console.log(dpz.files, dpz.options.maxFiles);
      dpz.files = []; //Limpiar lista de archivos
      // rs = dpz.removeAllFiles(false)
      // document.getElementById("iddrop").innerHTML = "" //Limpiar
      $(".dz-preview").remove();
      dt.lf.forEach((file, k) => {
        var mockFile = {
          name: file.NameItemf,
          size: 0,
          url: file.UrlItemf,
          id: file.IdItemf,
          accepted: true,
        };
        console.log(mockFile);
        dpz.emit("addedfile", mockFile);
        // console.log("MF",mockFile,"URL",cadenaurl+file.UrlItemf);
        // dpz.createThumbnailFromUrl(mockFile,file.UrlItemf);
        dpz.emit("thumbnail", mockFile, cadenaurl + file.UrlItemf);
        dpz.emit("success", mockFile, file.UrlItemf);
        dpz.emit("complete", mockFile);
        dpz.files.push(mockFile);
        // dpz.options.thumbnail.call(dpz, mockFile, cadenaurl+file.UrlItemf);
        // dpz.options.addedfile.call(dpz, mockFile);
      });

      $("#btgimg").toggle(true); //Mostrar boton de guardar imagenes
      $("#nigimg").toggle(true); //Mostrar tab con dropzone
      $("#mitems").modal()
    })
  }

  function delitem(id) { //Eliminar item
    cajax("ajaxieli", {
      id: id
    }, "¿Eliminar?", "Esta Acción será permanente", false) //No Recargar la página
  }

  //   Pagos
  $("#fpagos").on('submit', function(e) {
    if (this.checkValidity && !this.checkValidity()) return;
    e.preventDefault();
    f = $(document).find("#fpagos")
    dser = f.serializeArray();
    sd = {}
    dser.forEach(v => {
      sd[v.name] = v.value
    });
    sajax("ajaxpeditar", sd, false, true) //Recargar datos
  });
  $("#btpagos").on("click", () => {
    f = $("#fpagos") //reset form
    f[0].reset()
    $("#mpagos").modal()
  })

  function editpago(id) {
    f = $("#fpagos") //Reload form with data
    fajax("ajaxpver", {
      id: id
    }, (dt) => {
      d = dt.data
      // console.log("Edit Pago", d)
      for (i in d) { //Por cada dato
        // console.log("Ep", i, d[i]);
        f.find("#" + i).val(d[i])
      }
      $("#mpagos").modal()
    })
  }

  function delpago(id) { //Eliminar Pago
    cajax("ajaxpeli", {
      id: id
    }, "¿Eliminar Pago?", "La acción será permanente", false) //Recargar la página
  }

  var id = "<?= (isset($id)?$id:"") ?>";
  $(document).ready(function() {
    // DATATABLES
    titems = $("#titems").DataTable({
      ajax: {
        url: cadenaurl + '/' + ctrl + "/ajaxitems",
        type: "POST",
        data: {
          id: id
        }
      },
      order: [
        [2, 'asc']
      ],
      columns: [{
          data: 'FechItem',
          title: "Fecha"
        }, //Fecha
        {
          data: 'NomPres',
          title: "Presupuesto"
        }, //Nombre del Presupuesto
        {
          data: 'DescItem',
          title: "Descripción"
        }, //Descripción
        {
          data: 'CostItem',
          title: "Valor S/."
        }, //Costo soles
        {
          data: 'CostdItem',
          title: "Valor $"
        }, //Costo dolares
        {
          data: null,
          defaultContent: "",
          title: "Acciones"
        }, //Acciones
      ],
      columnDefs: [{ //Acciones
        render: function(data, type, row) {
          // console.log("ROW>",data,type,row);
          return '<a onclick="edititem(' + row.IdItem + ')" title="Editar Item" class="btn btn-icon btn-success waves-effect btn-circle waves-light"><i class="ti-pencil-alt" style="color: white;"></i></a>' +
            (b2?'':'<a onclick="delitem(' + row.IdItem + ')" title="Eliminar Item" class="btn btn-icon btn-danger waves-effect btn-circle waves-light"><i class="ti-close" style="color: white;"></i></a>');
        },
        targets: 5 //Column Acciones
      }, ],
      // Atributos comprimidos
      "scrollX": true,
      "autoWidth": true,
      "scrollCollapse": true,
      "pagingType": "full_numbers",
      "lengthMenu": [
        [15, 25, 50, -1],
        [15, 25, 50, "All"]
      ],
      language: {
        paginate: {
          previous: "<",
          next: ">"
        }
      },
      "paging": true,
      "processing": true,
      "searching": true,
      "lengthChange": true,
      "ordering": false,
      "info": false,
      "bProcessing": true,
      "pageLength": 15,
      "oLanguage": {
        "sUrl": cadenaurl + "resources/spanish.json"
      },
      pagingType: $(window).width() < 768 ? "simple" : "simple_numbers",
      "fnInitComplete": function() {
        const ps = new PerfectScrollbar('.dataTables_scrollBody');
        $(".selectAll").on("click", function(e) {
          if ($(this).is(":checked")) {
            tabasis.rows().select();
          } else {
            tabasis.rows().deselect();
          }
        })
      },
      "fnDrawCallback": function(oSettings) {
        const ps = new PerfectScrollbar('.dataTables_scrollBody');
      },
    })
    tpagos = $("#tpagos").DataTable({
      ajax: {
        url: cadenaurl + '/' + ctrl + "/ajaxpagos",
        type: "POST",
        data: {
          id: id
        }
      },
      order: [
        [2, 'asc']
      ],
      columns: [{
          data: 'FechPago',
          title: "Fecha"
        }, //Fecha
        {
          data: 'NoperPago',
          title: "N Operación"
        }, //Total
        {
          data: 'DescPago',
          title: "Descripción"
        }, //Saldo
        {
          data: 'ImpPago',
          title: "Valor S/."
        }, //
        {
          data: 'ImpdPago',
          title: "Valor $"
        }, //
        {
          data: null,
          defaultContent: "",
          title: "ACCIONES"
        }, //Acciones
      ],
      columnDefs: [
        { //Estado
          render: function(data, type, row) {
            l = {
              "0": "Ingreso",
              "1": "Salida Completa",
              "2": "Salida Sin Entrada",
              "3": "Entrada sin Salida"
            }
            return l[row.EstAsis];
          },
          targets: "ce" //Column Estado
        },
        { //Acciones
          render: function(data, type, row) {
            // console.log("ROW>",data,type,row);
            return '<a onclick="editpago(' + row.IdPago + ')" title="Editar Pago" class="btn btn-icon btn-success waves-effect btn-circle waves-light"><i class="ti-pencil-alt" style="color: white;"></i></a>' +
              (b2?'':'<a onclick="delpago(' + row.IdPago + ')" title="Eliminar Pago" class="btn btn-icon btn-danger waves-effect btn-circle waves-light"><i class="ti-close" style="color: white;"></i></a>');
          },
          targets: 5 //Column Acciones
        },
      ],
      // Atributos comprimidos
      "scrollX": true,
      "autoWidth": true,
      "scrollCollapse": true,
      "pagingType": "full_numbers",
      "lengthMenu": [
        [15, 25, 50, -1],
        [15, 25, 50, "All"]
      ],
      language: {
        paginate: {
          previous: "<",
          next: ">"
        }
      },
      "paging": true,
      "processing": true,
      "searching": true,
      "lengthChange": true,
      "ordering": false,
      "info": false,
      "bProcessing": true,
      "pageLength": 15,
      "oLanguage": {
        "sUrl": cadenaurl + "resources/spanish.json"
      },
      pagingType: $(window).width() < 768 ? "simple" : "simple_numbers",
      "fnInitComplete": function() {
        const ps = new PerfectScrollbar('.dataTables_scrollBody');
        $(".selectAll").on("click", function(e) {
          if ($(this).is(":checked")) {
            tabasis.rows().select();
          } else {
            tabasis.rows().deselect();
          }
        })
      },
      "fnDrawCallback": function(oSettings) {
        const ps = new PerfectScrollbar('.dataTables_scrollBody');
      },
    })
    // Validar form liquidacion
    $("#fliq").validate({
      rules: {},
      messages: {},
      submitHandler: function() {
        dser = $("#fliq").serializeArray();
        sd = {}
        dser.forEach(v => {
          sd[v.name] = v.value
        });
        // console.log(sd)
        sajax("ajaxeditar", sd, true)
      }
    });

    // Seleccionar grupo presupuesto y colocar opciones
    $(document).find("#IdGpres").on("change", () => {
      v = $(document).find("#IdGpres").val() //Id grupo
      fajax("ajaxpresup", {
          id: v
        },
        (no) => {
          setopt("IdPres", no.data)
        }
      );
    })
  })
</script>

<script>
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

      $('#miFormulario').submit(function(event) {
          event.preventDefault();
          // Resto del código para enviar el formulario
      });
  });
</script>

<?= $this->endSection() ?>
<?= $this->extend('layouts/layout_trab') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-12">
			<div class="card">
				<div class="card-body">
					<div class="tab-content">
                        <div class="row">
                            <div class="col-12">
                                <a style="color:white" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalCenter" id="btnModal"><i class="fas fa-plus"></i> Nuevo Usuario</a>
                                <table id="tlistAllUsuarios" class="table table-striped table-bordered nowrap" cellspacing="0" style="width:100%; "></table>
                            </div>
                        </div>
					</div>
				</div> <!-- end card-body-->
			</div> <!-- end card-->
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Creacion Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="postUsuario" method="post">
        <div class="modal-body">
            <div class="row">
                <div class="col form-group">
                    <label for="idusu">Id Usuario:</label>
                    <input id="idusu" class="form-control" type="text" name="IdUsu" readonly>
                </div>
                <div class="col form-group">
                    <label for="nomusu">Nombres Completos:</label>
                    <input id="nomusu" class="form-control" type="text" name="NomUsu">
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <label for="logusu">Usuario Logueo:</label>
                    <input id="logusu" class="form-control" type="text" name="LogUsu">
                </div>
                <div class="col form-group">
                    <label for="conusu">Contraseña:</label>
                    <input id="conusu" class="form-control" type="password" name="ConUsu">
                </div>
                <div class="form-group col">
                    <label for="idtusu">Tipo Usuario:</label>
                    <select id="idtusu" class="form-control">
                      <option value="1">Técnico</option>
                      <option value="2">Supervisor</option>
                      <option value="3">Admin</option>
                    </select>
                </div>
            </div>
        </div>
      
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="btnSubmit">Guardar</button>
        </div>
      </form>

    </div>
  </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('js') ?>

<script>
  pathArray = location.href.split('/');
  cadenaurl = pathArray[0] + "//" + pathArray[2] + "/";
  var lcm = JSON.parse('<?php echo (isset($cols) ? $cols : "") ?>');
  var ctrl = '<?php echo (isset($ctrl) ? $ctrl : "") ?>';
 
  var tlist = $('#tlistAllUsuarios').DataTable({
    responsive: true,
    ajax: {
      type: "POST",
      url: cadenaurl + ctrl + "/usuarios/ajaxAllUsuarios",
      data: data,
      dataType: 'json',
      dataSrc: function(json) {
         return json.data;
        },

    },
    columns: lcm,
    columnDefs: [
      { //Acciones
            render: function ( data, type, row ) {
                return '<a onclick="updateUsuario(' +  row.IdUsu + ') " title="Editar area" class="btn btn-circle btn-light" data-toggle="modal" data-target="#exampleModalCenter"><i class="ti-pencil-alt text-success"></i></a>'+
                '<a onclick="delUsuario(' +  row.IdUsu + ') " title="Eliminar area" class="btn btn-circle btn-light"><i class="ti-trash text-danger"></i></a>';
            },
            targets: lcm.length-1, //Column Acciones
      },
     
    ],
    "order": false,
    "scrollX": true,
    "autoWidth": true,
    "ordering": true,
    "lengthChange": true,
    "language": {
      "sUrl": cadenaurl + "resources/spanish.json"
    }

  });

  function recargar(){
    tlist.ajax.reload()
  }

  //EDITAR
  function updateUsuario(id){
   
        // $('#idEquip').val(id)
        $('#btnSubmit').text("Editar")
        $.ajax({
            type:"GET",
            url: cadenaurl + ctrl +`usuarios/editUsuario/${id}`,
            success:function(response){
                $('#idusu').val(response.IdUsu)
                $('#nomusu').val(response.NomUsu)
                $('#logusu').val(response.LogUsu)
                // $('#conusu').val(response.ConUsu)
                $('#idtusu').val(response.IdTUsu)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
            }
        });
  }


  //ELIMINAR USUARIO
  function delUsuario(id) {
    Swal.fire({
      title: "Usted desea Eliminar esta Usuario?",
      text: "Por favor, confirme la eliminacion de esta Usuario",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, deseo continuar!",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.value) //Si acepta
      sajax('usuarios/eliminarUsuario/' + id, false, false);
    });
  }

  $('#btnModal').on('click', function(event) {
      $('#btnSubmit').text("Guardar")
    });
</script>

<!-- NUEVO USUARIO Y ACTUALIZACION USUARIO-->
<script>
  $(document).ready(function() {
    $('#postUsuario').validate({
      rules: {
        NomUsu :"required",
        LogUsu: "required",
        ConUsu: "required",
      },
      messages: {
        NomUsu: "Colocar el nombre del usuario es obligatorio",
        LogUsu: "Colocar el usuario logueo es obligatorio",
        ConUsu: "Colocar la contraseña es obligatorio",
      },
      submitHandler: function (form) {
        dser =  $(form).serializeArray();
        
        if($('#btnSubmit').text()== 'Guardar'){
          
        //   PETICION A LA API   
          fajax('usuarios/newUsuario', dser, ()=>{
            $('#exampleModalCenter').modal('hide');
            Swal.fire({
                title: "Operación Exitosa",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success btn-fill",
                type: "success"
            })
            tlist.ajax.reload();
        })  
        }else{
        //   PETICION A LA API 
          fajax('usuarios/updateUsuario',dser, ()=>{
            $('#exampleModalCenter').modal('hide');
            Swal.fire({
                title: "Operación Exitosa",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success btn-fill",
                type: "success"
            })
            tlist.ajax.reload();
          })
        }
              
      }
    });
  });

    $('#exampleModalCenter').on('hidden.bs.modal', function(e) {
      $(this).find('#postUsuario')[0].reset();
      $("#postUsuario").data('validator').resetForm();
    });

</script>

<?= $this->endSection() ?>
<?= $this->extend('layouts/layout_trab') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Perfil de Usuario</h4>
					<form class="needs-validation" novalidate action="<?=base_url('usuarios/submiteditar')?>" method="post">
						<div class="form-row">
							<input type="hidden" name="IdUsu" value="<?= $udata["IdUsu"] ?>">
							<div class="col-md-4 mb-3">
								<label for="NomUsu">Nombre Completo</label>
								<input type="text" class="form-control" name="NomUsu" id="NomUsu" maxlength="10" placeholder="Nombre" value="<?=$udata['NomUsu']?>" required>
								<div class="valid-feedback">
									Correcto.
								</div>
								<div class="invalid-feedback">
									Campo obligatorio.
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="LogUsu">Usuario para Logueo</label>
								<input type="text" class="form-control" name="LogUsu" id="LogUsu" maxlength="100" placeholder="Credencial Logueo" value="<?=$udata['LogUsu']?>" required>
								<div class="valid-feedback">
									Correcto.
								</div>
								<div class="invalid-feedback">
									Campo obligatorio.
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="EmpUsu">Empresa del Usuario</label>
								<input type="text" class="form-control" name="EmpUsu" id="EmpUsu" maxlength="20" placeholder="Empresa del usuario" value="<?=$udata['EmpUsu']?>" required>
								<div class="valid-feedback">
									Correcto.
								</div>
								<div class="invalid-feedback">
									Campo obligatorio.
								</div>
							</div>
						</div>
						<button class="btn btn-primary" type="submit">Guardar</button>
						<a class="btn waves-effect waves-light btn-danger" style="color: white;" href="<?=base_url('usuarios/rcon')?>">Cambiar Contraseña</a>
					</form>

				</div>
			</div>
		</div>

	</div>
</div>

<?= $this->endSection() ?>
<?= $this->section('js') ?>

<script>
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
    if(fd != ""){
		//Mostrar toast
		if(fd.r) toastr.success('Datos actualizados','Éxito' );
		else toastr.error('Hubo un problema, puede que no haya conexión o haya un error en el servidor','Error');
    }

	$('form.fpad').signaturePad({
		drawOnly: true,
		defaultAction: 'drawIt',
		validateFields: false,
		lineWidth: 0,
		output: 'input[name=output]',
		sigNav: null,
		name: null,
		typed: null,
		clear: 'input[type=button]',
		typeIt: null,
		drawIt: null,
		typeItDesc: null,
		drawItDesc: null,
	}).regenerate([{"lx":139,"ly":63,"mx":139,"my":62}]);
</script>

<?= $this->endSection() ?>
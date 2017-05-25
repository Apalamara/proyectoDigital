<?php $bodyClass = 'page-register' ?>
<?php require_once('header.php'); ?>

<main id="register">

	<section>
		<div class="container">

			<h2>Quiero registrarme</h2>

			<!--Empieza el form de registro -->
			<!--Tengo que agregar un div container del form -->

			<form action="" method="post">

				
					<div class="form-group">
						<input type="text" name="email" class="form-control" id="email" placeholder="mmouse@disney.com" value="" required="required">
						<!--<i class="icon-mail-alt"></i>-->
						<label for="email">Email</label>
					</div>

					<div class="form-group">		
						<input type="text" name="first_name" class="form-control" id="first_name" placeholder="Jose" value="" required="required">
						<label for="first_name">Nombre</label>
					</div>

					<div class="form-group">		
						<input type="text" name="last_name" class="form-control" id="last_name" placeholder="Canseco" value="" required="required">
						<label for="last_name">Apellido</label>
					</div>
			
					<div class="form-group">
						<input type="password" name="pass" class="form-control" id="password" placeholder="Ingrese Contraseña" required="required">
						<label for="password">Contraseña</label>
					</div>

					<div class="form-group">
						<input type="password" name="pass_confirm" class="form-control" id="pass_confirm" placeholder="Confirmar Contraseña" required="required">
						<label for="pass_confirm">Confirmar Contraseña</label>
					</div>

					<div class="checkbox">
						<label for="terms" class="terms">
							<input type="checkbox" id="terms" name="terms"> Me gustaría recibir cupones, promociones, encuestas y actualizaciones por correo electrónico sobre OfficeGuru y sus socios.
						</label>
						<p>Al hacer clic en Registrarme, acepto las Condiciones del servicio, las Condiciones sobre pagos, la política de Privacidad y de Cookies y la Política contra la discriminación de Office Guru.</p>
					</div>

				<input type="submit" name="btn-submit" class="btn btn-register" value="Registrarme">
			</form>

		</div>
	</section>
</main>

<?php require_once('footer.php'); ?>
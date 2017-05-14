<?php require_once('header.php'); ?>

<main>
	<section>
		<h2>Quiero registrarme</h2>
	</section>

	<!--Empieza el form de registro -->

	<form action="/" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="form-group">
				<label for="full_name">Nombre y Apellido</label>
				<input type="text" name="full_name" class="form-control" id="full-name" placeholder="Nombre y Apellido" value="">
			</div>
		</fieldset>

		<!--<fieldset>
			<div class="form-group">
				<label for="company_name">Nombre de la empresa</label>
				<input type="text" name="company_name" class="form-control" id="company-name" placeholder="Nombre de la empresa" value="">
			</div>
		</fieldset>-->

		<fieldset>
			<div class="form-group">
				<label for="phone">+54 Teléfono</label>
				<input type="text" name="phone" class="form-control" id="phone" placeholder="+54 Teléfono" value="">
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" class="form-control" id="email" placeholder="Email" value="">
			</div>
		</fieldset>

		<fieldset>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="text" name="password" class="form-control" id="password" placeholder="Ingrese Contraseña">
			</div>
			<div class="form-group">
				<label for="password-confirm">Confirmar Contraseña</label>
				<input type="text" name="password-confirm" class="form-control" id="password-confirm" placeholder="Confirmar Contraseña">
			</div>
		</fieldset>
		
		<fieldset>	
			<div class="checkbox">
				<label for="terms">
					<input type="checkbox" id="terms" name="terms"> Acepto los términos y condiciones
				</label>
			</div>
			<div>
				<span>Al hacer clic en Registrarme, acepto las Condiciones del servicio, las Condiciones sobre pagos, la política de Privacidad y de Cookies y la Política contra la discriminación de Office Guru.</span>
			</div>
		</fieldset>	

		<input type="submit" name="btn-submit" class="btn" value="Registrarme">
	</form>

	<div>
		<span>¿Ya tenés una cuenta de Office Guru?</span>
		<span><a href="login">Iniciar Sesión</a></span>
	</div>
</main>

<?php require_once('footer.php'); ?>
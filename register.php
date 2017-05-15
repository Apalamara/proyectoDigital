<?php require_once('header.php'); ?>

<main id="register">

	<!--Botones de reigstro -->

	<div class="register-nav">
		<ul class="tab-group">
			<li class="tab active"><a href="#signup">Sign Up</a></li>
			<li class="tab"><a href="#login">Log In</a></li>
		</ul>
	</div>

	<!--Empieza el form de registro -->

	<form action="/" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="form-group">		
				<input type="text" name="full_name" class="form-control" id="full-name" placeholder="Mickey Mouse" value="">
				<label for="full_name">Nombre y Apellido</label>
			</div>
		</fieldset>

		<fieldset>
			<div class="form-group">
				<input type="text" name="phone" class="form-control" id="phone" placeholder="+54 11 55257773" value="">
				<label for="phone">+54 Teléfono</label>
			</div>
		</fieldset>

		<fieldset>
			<div class="form-group">
				<input type="text" name="email" class="form-control" id="email" placeholder="mmouse@disney.com" value="">
				<label for="email">Email</label>
			</div>
		</fieldset>

		<fieldset>
			<div class="form-group">
				<input type="text" name="password" class="form-control" id="password" placeholder="Ingrese Contraseña">
				<label for="password">Contraseña</label>
			</div>
		</fieldset>

		<fieldset>
			<div class="form-group">
				<input type="text" name="password-confirm" class="form-control" id="password-confirm" placeholder="Confirmar Contraseña">
				<label for="password-confirm">Confirmar Contraseña</label>
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

	<!--<div>
		<span>¿Ya tenés una cuenta de Office Guru?</span>
		<span><a href="login">Iniciar Sesión</a></span>
	</div>-->
</main>

<?php require_once('footer.php'); ?>
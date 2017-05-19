<?php require_once('header.php'); ?>

<main id="register">

	<!--Botones de registro 

	<div class="register-nav">
		<ul class="tab-group">
			<li class="tab active"><a href="register.php">Sign Up</a></li>
			<li class="tab second"><a href="login.php">Log In</a></li>
		</ul>
	</div>  -->

	<div class="register-nav">
		<span>Quiero registrarme</span>
	</div>

	<!--Empieza el form de registro -->

	<form action="/" method="get" enctype="multipart/form-data">
		<fieldset>
			<div class="form-group">		
				<input type="text" name="full_name" class="form-control" id="full-name" placeholder="Mickey Mouse" value="">
				<label for="full_name">Nombre y Apellido</label>
			</div>
		</fieldset>

		<fieldset>
			<div class="form-group">
				<input type="text" name="phone" class="form-control" id="phone" placeholder="+54 11 55257773" value="">
				<label for="phone">Teléfono</label>
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
				<input type="password" name="password" class="form-control" id="password" placeholder="Ingrese Contraseña">
				<label for="password">Contraseña</label>
			</div>
		</fieldset>

		<fieldset>
			<div class="form-group">
				<input type="password" name="password-confirm" class="form-control" id="password-confirm" placeholder="Confirmar Contraseña">
				<label for="password-confirm">Confirmar Contraseña</label>
			</div>
		</fieldset>
		
		<fieldset>	
			<div class="checkbox">
				<label for="terms" class="terms">
					<input type="checkbox" id="terms" name="terms"> Acepto los términos y condiciones
				</label>
			</div>
			<!--<div>
				<span>Al hacer clic en Registrarme, acepto las Condiciones del servicio, las Condiciones sobre pagos, la política de Privacidad y de Cookies y la Política contra la discriminación de Office Guru.</span>
			</div>-->
		</fieldset>	

		<input type="submit" name="btn-submit" class="btn btn-register" value="Registrarme">
	</form>
</main>

<?php require_once('footer.php'); ?>
<?php require_once('header.php'); ?>
<main id="register">

	<!--Botones de reigstro 

	<div class="register-nav">
		<ul class="tab-group">
			<li class="tab second"><a href="register.php">Sign Up</a></li>
			<li class="tab active"><a href="login.php">Log In</a></li>
		</ul>
	</div> -->

	<div class="register-nav">
		<span>Iniciar sesión</span>
	</div>

	<!--Empieza el form de registro -->

	<form action="/" method="get" enctype="multipart/form-data">
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

		<input type="submit" name="btn-submit" class="btn btn-register" value="Iniciar Sesión">
		<span class="forgot-pass"><a href="#login">Recuperar contraseña</a></span>
	</form>
</main>
<?php require_once('footer.php'); ?>
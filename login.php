<?php require_once('header.php'); ?>

<main>
	<section id="register">
		<div class="container">
			<h2 class="p-left p-right">Iniciar Sesión</h2>
			<div class="legal-text">
				<h4>¿Todavía no formás parte? <br/> <a href="register.php">Creá tu cuenta</a></h4>
			</div>
			<!--Empieza el form de registro -->
			<div class="p-left p-right p-half-top">
				<form class="form-login" action="/" method="get" enctype="multipart/form-data">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" class="form-control" id="email" placeholder="mmouse@disney.com" value="">
						</div>

						<div class="form-group">
							<label for="password">Contraseña</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Ingrese Contraseña">
						</div>

					<label for="terms" class="terms"><input type="checkbox" id="newsletter" name="newsletter"> Recordarme</label>

					<input type="submit" name="btn-submit" class="btn btn-register" value="Iniciar Sesión">

					<div class="legal-text">
						<p><a href="#login">Recuperar contraseña</a></p>
					</div>
				</form>
			</div>
		</div>
	</section>
</main>



<?php require_once('footer.php'); ?>
<?php $bodyClass = 'page-register' ?>
<?php require_once('./php/users.php'); ?>
<?php require_once('header.php'); ?>

<?php
	// Tener en cuenta el name del input
	$email = $_POST['email'] ?? null;
	$firstName = $_POST['first_name'] ?? null;
	$lastName = $_POST['last_name'] ?? null;
	$newsletter = $_POST['newsletter'] ?? null;

	$errors = [];
	if($_POST)
	{
		if(!($errors = register($_POST)))
		{
			header('location: welcome.php');
			exit;
		}
	}

	// Formatea el print-r
	// echo '<pre>' . print_r ($_POST, true) . '</pre>';
?>

<main id="register">

	<section>
		<div class="container">

			<h2>Quiero registrarme</h2>

			<?php
			if($errors) { ?>
				<div class="alert alert-danger">
				<?php foreach($errors as $error) {
					echo $error . '<br>';
				}?>
				</div>
			<?php } ?>

			<!--Empieza el form de registro -->

			<form action="" method="post">

				
					<div class="form-group">
						<input type="text" name="email" class="form-control" id="email" placeholder="mmouse@disney.com" value="<?php echo $email; ?>">
						<!--<i class="icon-mail-alt"></i>-->
						<label for="email">Email</label>
					</div>

					<div class="form-group">		
						<input type="text" name="first_name" class="form-control" id="first_name" placeholder="Jose" value="<?php echo $firstName; ?>">
						<label for="first_name">Nombre</label>
					</div>

					<div class="form-group">		
						<input type="text" name="last_name" class="form-control" id="last_name" placeholder="Canseco" value="<?php echo $lastName; ?>">
						<label for="last_name">Apellido</label>
					</div>
			
					<div class="form-group">
						<input type="password" name="pass" class="form-control" id="password" placeholder="Ingrese Contraseña">
						<label for="password">Contraseña</label>
					</div>

					<div class="form-group">
						<input type="password" name="pass_confirm" class="form-control" id="pass_confirm" placeholder="Confirmar Contraseña">
						<label for="pass_confirm">Confirmar Contraseña</label>
					</div>

					<div class="checkbox">
						<label for="terms" class="terms">
							<input type="checkbox" id="newsletter" name="newsletter"> Me gustaría recibir cupones, promociones, encuestas y actualizaciones por correo electrónico sobre OfficeGuru y sus socios.
						</label>
						<p>Al hacer clic en Registrarme, acepto las Condiciones del servicio, las Condiciones sobre pagos, la política de Privacidad y de Cookies y la Política contra la discriminación de Office Guru.</p>
					</div>

				<input type="submit" class="btn btn-register" value="Registrarme">
			</form>

		</div>
	</section>
</main>

<?php require_once('footer.php'); ?>
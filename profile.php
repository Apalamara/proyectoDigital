<?php $bodyClass = 'page-profile menu-inverse' ?>
<?php require_once('./php/users.php'); ?>
<?php require_once('header.php'); ?>

<?php
	// Tener en cuenta el name del input
	$email = $_SESSION['user']['email'] ?? null;
	$firstName = $_SESSION['user']['first_name'] ?? null;
	$lastName = $_SESSION['user']['last_name'] ?? null;
	$newsletter = $_SESSION['user']['newsletter'] ?? null;

	/*
	$errors = [];
	if($_POST)
	{
		if(!($errors = register($_POST)))
		{
			header('location: welcome.php');
			exit;
		}
	}
	*/
?>

<main>
	<section id="register">
		<div class="container">
			<div class="txt-center">
				<h4><?php echo uniqid(mt_rand(), true); ?></h4>
				<img class="avatar avatar-lg" src="<?php echo USERS_IMAGES_PATH . $_SESSION['user']['image'] ?>" alt="<?php echo $_SESSION['user']['first_name']; ?>"> 
			</div>

			<div class="p-left p-right p-half-top">
				<!--Empieza el form de registro -->
				<form class="form-register" enctype="multipart/form-data" action="" method="post">
					<!-- 
						Tamaño máximo de imagen en bytes. Esto es sólo para cortar la transferencia en caso de que se pase del tamaño
						pero de igual manera debe validarse del lado del servidor.
					-->
					<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
					
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>">
						<!--<i class="icon-mail-alt"></i>-->
					</div>

					<div class="form-group">		
						<label for="first_name">Nombre</label>
						<input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo $firstName; ?>">
					</div>

					<div class="form-group">		
						<label for="last_name">Apellido</label>
						<input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo $lastName; ?>">
					</div>

					<div class="form-group">		
						<label for="last_name">Imagen</label>
						<input type="file" name="image" class="form-control" id="image" value="">
						<p>La imagen debe ser de al menos 400px x 400px y deberá pesar menos de 5 Mb.</p>
					</div>

					<div class="form-group">
						<label for="password">Contraseña</label>
						<input type="password" name="password" class="form-control" id="password" value="">
					</div>

					<div class="form-group">
						<label for="pass_confirm">Confirmar Contraseña</label>
						<input type="password" name="pass_confirm" class="form-control" id="pass_confirm" value="">
					</div>

					<input type="submit" class="btn btn-register" value="Registrarme">

					<div class="legal-text">
						<!-- <label for="terms" class="terms">
							<input type="checkbox" id="newsletter" name="newsletter"> Me gustaría recibir cupones, promociones, encuestas y actualizaciones por correo electrónico sobre OfficeGuru y sus socios.
						</label> -->
						<p>Al hacer clic en Registrarme, acepto los <a href="#" target="_blank">términos y condiciones del servicio.</a></p>
					</div>

					
				</form>
			</div>

		</div>
	</section>
</main>

<?php require_once('footer.php'); ?>
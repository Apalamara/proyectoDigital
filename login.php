<?php require_once('./php/requires.php'); ?>
<?php 
if (isLoggedIn()) 
{
	header('location: index.php');
	exit;
} 
?>
<?php
	// Tener en cuenta el name del input
	$email = $_POST['email'] ?? null;

	$errors = [];
	if($_POST)
	{
		if(!($errors = login($_POST)))
		{
			header('location: index.php');
			exit;
		}
	}
?>

<?php $bodyClass = 'page-login'; ?>
<?php require_once('header.php'); ?>

<main>
	<section id="register">
		<div class="container">
			<h2 class="p-left p-right">Iniciar Sesión</h2>
			<div class="legal-text">
				<h4>¿Todavía no formás parte? <br/> <a href="register.php">Creá tu cuenta</a></h4>
			</div>

			<?php
				if($errors) { ?>
					<div class="alert alert-danger">
					<?php foreach($errors as $error) {
						echo $error . '<br>';
					}?>
					</div>
			<?php } ?>

			<!--Empieza el form de registro -->
			<div class="p-left p-right p-half-top">
				<form class="form-login" action="" method="post">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" class="form-control" id="email" placeholder="mmouse@disney.com" value="<?php echo $email; ?>">
						</div>

						<div class="form-group">
							<label for="password">Contraseña</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Ingrese Contraseña">
						</div>

					<label class="terms"><input type="checkbox" name="remember_me"> Recordarme</label>

					<input type="submit" class="btn btn-register" value="Iniciar Sesión">

					<div class="legal-text">
						<p><a href="#login">Recuperar contraseña</a></p>
					</div>
				</form>
			</div>
		</div>
	</section>
</main>



<?php require_once('footer.php'); ?>
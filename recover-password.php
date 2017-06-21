<?php require_once('./php/requires.php'); ?>
<?php 
if (isLoggedIn()) 
{
	header('location: index.php');
	exit;
}

$errors = [];
if($_POST)
{
	if(!($errors = recover($_POST)))
	{
		$message = ['type' => 'success', 'text' => 'Tu perfil ha sido actualizado'];
	}
}

$email = $_SESSION['user']['email'] ?? null;
$firstName = $_SESSION['user']['first_name'] ?? null;
$lastName = $_SESSION['user']['last_name'] ?? null;

?>
<?php $bodyClass = 'page-profile menu-inverse' ?>
<?php require_once('header.php'); ?>
<main>
	<section class="user-form">
		<div class="container">
			<h2 class="pad-left pad-right">Para recuperar la contraseña deberás responder con tus datos</h2>
			<div class="legal-text">
				<h4>¿Ya te acordaste la contraseña? <a href="login.php">Iniciá Sesión</a></h4>
			</div>

			<?php if($errors) { ?>
				<div class="alert alert-danger">
					<?php foreach($errors as $error) {
						echo $error . '<br>';
					}?>
				</div>
			<?php } ?>

			<div class="pad-left pad-right pad-half-top">
				<!--Empieza el form de registro -->
				<form class="form-register" action="" method="post">

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" id="email" value="">
						<!--<i class="icon-mail-alt"></i>-->
					</div>

					<div class="form-group">		
						<label for="first_name">Nombre</label>
						<input type="text" name="first_name" class="form-control" id="first_name" value="">
					</div>

					<div class="form-group">		
						<label for="last_name">Apellido</label>
						<input type="text" name="last_name" class="form-control" id="last_name" value="">
					</div>

					<input type="submit" class="btn btn-register" value="Recuperar mi contraseña">
					
				</form>
			</div>

		</div>
	</section>
</main>

<?php require_once('footer.php'); ?>
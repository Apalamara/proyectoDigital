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
	$user = findByField('email', $_POST['email']);
	if(!$user)
	{
		$errors[] = 'El email no se encuentra en nuestra base de datos';
	}
	else
	{
		$token = new UsersTokens($user['id']);
		header('location: recover-email.php?token=' . $token->generate());
		exit;
	}
}

$email = $_SESSION['user']['email'] ?? null;

?>
<?php $bodyClass = 'page-profile menu-inverse' ?>
<?php require_once('header.php'); ?>
<main>
	<section class="user-form">
		<div class="container">
			<h2 class="pad-left pad-right">Completá los datos y te enviaremos un e-mail</h2>
			<div class="legal-text">
				<h4>¿Ya te acordaste la contraseña? <a href="login.php">Iniciá Sesión</a></h4>
			</div>

			<?php if($errors) { ?>
				<div class="row">				
					<div class="col-6 col-centered">
						<div class="alert alert-warning">
							<?php foreach($errors as $error) {
								echo $error . '<br>';
							}?>
						</div>
					</div>
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

					<input type="submit" class="btn btn-register" value="Recuperar mi contraseña">
					
				</form>
			</div>

		</div>
	</section>
</main>

<?php require_once('footer.php'); ?>
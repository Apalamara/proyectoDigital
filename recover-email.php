<?php require_once('./php/requires.php'); ?>
<?php 
if (isLoggedIn()) 
{
	header('location: index.php');
	exit;
}

$token = $_GET['token'];

?>
<?php $bodyClass = 'page-profile menu-inverse' ?>
<?php require_once('header.php'); ?>
<main>
	<section class="user-form">
		<div class="container">
			<h2 class="pad-left pad-right">Haz solicitado recuperar tu contraseña</h2>
			<div class="legal-text">
				<h4>Haz click en el link de más abajo para resetearla.</h4>
			</div>

			<div class="pad-left pad-right pad-half-top">
				<a class="btn btn-register" href="recover-password.php?token=<?php echo $token ?>">recuperar password</a>
			</div>

		</div>
	</section>
</main>

<?php require_once('footer.php'); ?>
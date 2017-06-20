<?php require_once('./php/requires.php'); ?>
<?php 
if (!isLoggedIn()) 
{
	header('location: index.php');
	exit;
} 

$errors = [];
if($_POST)
{
	if(!($errors = update($_POST, $_FILES)))
	{
		$message = ['type' => 'success', 'text' => 'Tu perfil ha sido actualizado'];
	}
}

$email = $_SESSION['user']['email'] ?? null;
$firstName = $_SESSION['user']['first_name'] ?? null;
$lastName = $_SESSION['user']['last_name'] ?? null;
$image = $_SESSION['user']['image'] ?? 'default.png';
$id = $_SESSION['user']['id'];

?>
<?php $bodyClass = 'page-profile menu-inverse' ?>
<?php require_once('header.php'); ?>
<main>
	<section id="register">
		<div class="container">
			<?php if($errors) { ?>
				<div class="alert alert-danger">
					<?php foreach($errors as $error) {
						echo $error . '<br>';
					}?>
				</div>
			<?php } ?>

			<div class="txt-center">
				<img class="avatar avatar-lg" src="<?php echo USERS_IMAGES_PATH . $image ?>" alt="<?php echo $_SESSION['user']['first_name']; ?>"> 
			</div>

			<div class="p-left p-right p-half-top">
				<!--Empieza el form de registro -->
				<form class="form-register" enctype="multipart/form-data" action="" method="post">
					<!-- 
						Tamaño máximo de imagen en bytes. Esto es sólo para cortar la transferencia en caso de que se pase del tamaño
						pero de igual manera debe validarse del lado del servidor.
					-->
					<input type="hidden" name="id" value="<?php echo $id ?>" />
					<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo USERS_IMAGES_MAX_SIZE ?>" />
					
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

					<input type="submit" class="btn btn-register" value="Actualizar mis datos">
					
				</form>
			</div>

		</div>
	</section>
</main>

<?php require_once('footer.php'); ?>
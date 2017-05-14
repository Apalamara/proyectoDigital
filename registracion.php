<?php
$meses = [1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre"];
$categorias = [1 => 'Deportes', 2 => 'Geografía', 3 => 'Historia', 4 => 'Ciencias'];

$nombre = $_POST['nombre'] ?? null;
$apellido = $_POST['apellido'] ?? null;
$username = $_POST['username'] ?? null;
$email = $_POST['email'] ?? null;
$emailConfirm = isset($_POST['email_confirm']) ? $_POST['email_confirm'] : null;

$genero = $_POST['genero'] ?? null;
$dia = $_POST['fnac_dia'] ?? null;
$mes = $_POST['fnac_mes'] ?? null;
$anio = $_POST['fnac_anio'] ?? null;
$cats = $_POST['categorias'] ?? [];
$descripcion = $_POST['descripcion'] ?? null;

$errores = [];
if($_POST)
{
	if(!trim($nombre)) {
		$errores['nombre'] = 'Debe ingresar un nombre';
	}

	if(trim($apellido) == '') {
		$errores['apellido'] = 'Debe ingresar un apellido';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registración</title>
	<meta name="description" content="Registración de prueba">

	<!-- Bootstrap -->
	<link href="assets/libs/bootstrap-3/css/bootstrap.min.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-links">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Proyecto</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-links">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Inicio</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="login.php">Login</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<?php
			//if(count($errores) > 0) {
			//if(!empty($errores)) {
			if($errores) { ?>
				<div class="alert alert-danger">
				<?php foreach($errores as $error) {
					echo $error . '<br>';
				}?>
				</div>
			<?php } ?>
			<form role="form" action="" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group col-sm-6">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" placeholder="Ingrese Nombre">
					</div>
					<div class="form-group col-sm-6">
						<label for="apellido">Apellido</label>
						<input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido; ?>" placeholder="Ingrese Apellido">
						<span><?php echo(isset($errores['apellido']) ? $errores['apellido'] : '' );?></span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-6">
						<label for="username">Nombre de Usuario</label>
						<input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" placeholder="Ingrese Nombre de Usuario">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-6">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Ingrese Email">
					</div>
					<div class="form-group col-sm-6">
						<label for="email-confirm">Confirmar Email</label>
						<input type="text" class="form-control" id="email-confirm" name="email_confirm" value="<?php echo $emailConfirm; ?>" placeholder="Ingrese Confirmación Email">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-6">
						<label for="contrasena">Contraseña</label>
						<input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese Contraseña">
					</div>
					<div class="form-group col-sm-6">
						<label for="contrasena-confirm">Confirmar Contraseña</label>
						<input type="password" class="form-control" id="contrasena-confirm" name="contrasena_confirm" placeholder="Ingrese Confirmación Contraseña">
					</div>
				</div>
				<div class="form-group">
					<label>Avatar</label>
					<div>
						<input type="file" name="avatar"/>
					</div>
				</div>
				<div class="form-group">
					<label>Sexo</label>
					<div>
						<label class="radio-inline">
							<input type="radio" name="genero" id="genero_masculino" value="0"
							<?php echo($genero === "0") ? 'checked="checked"' : ''; ?>> Masculino
						</label>
						<label class="radio-inline">
							<input type="radio" name="genero" id="genero_femenino" value="1"
							<?php echo($genero == "1") ? 'checked="checked"' : ''; ?>> Femenino
						</label>
						<label class="radio-inline">
							<input type="radio" name="genero" id="genero_otros" value="2"
							<?php echo($genero == "2") ? 'checked="checked"' : ''; ?>> Otro
						</label>
					</div>
				</div>
				<div class="form-group">
					<label> Fecha de Nacimiento</label>
					<div class="row">
						<div class="col-sm-4">
							<select class="form-control" name="fnac_dia">
								<option value="">Día</option>
								<?php for($i = 1; $i <= 31; $i++) { ?>
									<option
										value="<?php echo $i; ?>"
										<?php echo($i == $dia) ? 'selected="selected"' : ''; ?>
									><?php echo $i; ?></option>
								<?php } ?>

								<?php /* for($i = 1; $i <= 31; $i++) {
									echo '<option value="' . $i . '">' . $i . '</option>';
								} */?>
							</select>
						</div>
						<div class="col-sm-4">
							<select class="form-control" name="fnac_mes">
								<option value="">Mes</option>
								<?php foreach($meses as $numero => $nombre) { ?>
									<option
										value="<?php echo $numero; ?>"
										<?php echo($numero == $mes) ? 'selected="selected"' : ''; ?>
									><?php echo $nombre;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-sm-4">
							<select class="form-control" name="fnac_anio">
								<option value="">Año</option>
								<?php for($i = date('Y'); $i >= (date('Y') - 100); $i--) { ?>
									<option
										value="<?php echo $i; ?>"
										<?php echo($i == $anio) ? 'selected="selected"' : ''; ?>
									><?php echo $i; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Categorías</label>
					<div>
						<?php foreach($categorias as $id => $categoria) { ?>
							<div class="checkbox">
								<label>
									<input
										type="checkbox"
										name="categorias[]"
										value="<?php echo $id; ?>"
										<?php echo(in_array($id, $cats) ? 'checked="checked"' : ''); ?>
									> <?php echo $categoria;?>
								</label>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="form-group">
					<label for="descripcion">Descripción</label>
					<textarea id="descripcion" name="descripcion" class="form-control" rows="5"><?php echo $descripcion ?></textarea>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" id="chk-terminos" name="terminos"> Acepto los términos y condiciones
					</label>
				</div>
				<input type="submit" name="btn_submit" class="btn btn-info" value="Registrarme"/>
			</form>
		</div>
	</div>
	<div class="text-center">&copy; <?php echo date('Y'); ?></div>
	<script src="assets/libs/jquery/jquery-1.11.1.min.js"></script>
	<script src="assets/libs/bootstrap-3/js/bootstrap.min.js"></script>
</body>
</html>
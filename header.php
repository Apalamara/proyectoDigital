<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OfficeGuru</title>
	<!-- En W3C sugieren esta linea -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Css utilizados -->
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style-home.css">
</head>
<body class="<?php echo (isset($bodyClass) ? $bodyClass : ''); ?>">
	<header>
		<div class="container">
			<h1 class="logo"><a href="index.php">OfficeGuru</a></h1>
			<div class="menus group">			
				<nav class="main horizontal">
					<ul>
						<li class="menu-item-host"><a href="register.php">Conviértete en anfitrión</a></li>
						<li class="menu-item-faq"><a href="faq.php">FAQ</a></li>
						<li class="menu-item-register"><a href="register.php">Regístrate</a></li>
						<li class="menu-item-login"><a href="login.php">Iniciar sesión</a></li>
					</ul>
				</nav>
				<nav class="social horizontal">
					<ul>
						<li><a href="https://facebook.com" target="_blank"><i class="icon-facebook"></i></a></li>
						<li><a href="https://twitter.com" target="_blank"><i class="icon-twitter"></i></a></li>
						<li><a href="https://linkedin.com" target="_blank"><i class="icon-linkedin"></i></a></li>
						<li><a href="https://instagram.com" target="_blank"><i class="icon-instagram"></i></a></li>
						<li><a href="https://youtube.com" target="_blank"><i class="icon-youtube"></i></a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>

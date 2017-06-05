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
</head>
<body class="<?php echo (isset($bodyClass) ? $bodyClass : ''); ?>">
	<div class="video-container">
		<video id="bgVideo" controls preload="true" autoplay loop muted>
			<source src="img/office-bg.mp4" type="video/mp4" > 
		</video>
	</div>
	<header>	
		<div class="container group">
			<div class="row">
				<div class="col-12">
					<h1 class="logo">Office Gurú<a href="index.php"><img src="img/logo.png" alt="Office Guru"></a></h1>
					<div class="menus group">
						<img class="menu-mobile" src="img/menu.png">
						<nav class="menu-main horizontal">
							<ul>
								<li class="menu-item-host"><a href="register.php">Convertite en gurú</a></li>
								<li class="menu-item-faq"><a href="faq.php">FAQ</a></li>
								<li class="menu-item-register"><a href="register.php">Registrate</a></li>
								<li class="menu-item-login"><a href="login.php">Ingresá</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
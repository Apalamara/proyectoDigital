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

	<header>	

		<div class="video-container">
			<video id="bgVideo" controls preload="true" autoplay loop muted>
				<source src="img/office-bg.mp4" type="video/mp4" > 
			</video>
		</div>

		<div class="container group">
			<div class="row">
				<div class="navbarheader col-lg-12">
					<div class="menus group container">
						<img class="menu-mobile" src="img/menu.png">

						<nav class="headernav">
							<div class="headerlogo">
								<h1 class="logo">Office Gurú<a href="index.php"><img src="img/logo.png" alt="Office Guru"></a></h1>
							</div>

							<div class="headernav-menu">	
								<ul>
									<li class="menu-item-host"><a href="register.php">Convertite en gurú</a></li>
									<li class="menu-item-faq"><a href="faq.php">FAQ</a></li>
									<?php if (isLoggedIn()) { ?>
									<li class="menu-item-user">
										<a href="profile.php">
											<img class="avatar avatar-sm" src="<?php echo USERS_IMAGES_PATH . $_SESSION['user']['image'] ?>" alt="<?php echo $_SESSION['user']['first_name']; ?>"> 
											<?php echo $_SESSION['user']['first_name']; ?>
										</a>
									</li>
									<li class="menu-item-user"><a href="logout.php"><i class="icon-lock"></i> Salir</a></li>
									<?php } else { ?>
									<li class="menu-item-register"><a href="register.php">Registrate</a></li>
									<li class="menu-item-login"><a href="login.php">Ingresá</a></li>
									<?php } ?>
								</ul>
							</div>
						</nav>

					</div>
				</div>
			</div>
		</div>

	</header>
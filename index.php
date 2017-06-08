
<?php require_once('./php/requires.php'); ?>
<?php $bodyClass = 'page-home'; ?>
<?php require_once('header.php'); ?>
<main>
	<section class="search">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="search-container">				
						<h2>¡Encontrá tu próxima oficina!</h2>
						<form name="office-search" action="offices.php" method="post">
							<select name="office_type" id="office_type">
								<option value="">Estoy buscado...</option>
								<option value="">Palermo</option>
								<option value="">San Telmo</option>
								<option value="">La luna</option>
							</select>
							<input type="text" name="office_location" placeholder="cerca de...">
						</form>	
					</div>			
				</div>
			</div>
		</div>
	</section>
	<?php require_once('office-list.php'); ?>
</main>
<?php require_once('footer.php'); ?>
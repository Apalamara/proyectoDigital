<?php
$offices = [
	[
		'title' => 'Oficina 1',
		'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
		'image' => 'http://placehold.it/200x200',
		'price' => '2342',
		'services' => [
			'icon-instagram' => 'WiFi',
			'icon-instagram' => 'Electricidad',
			'icon-instagram' => 'Infusiones',
		],
		'rating' => 4.5,
		'ratingCount' => 23,
	], [
		'title' => 'Oficina 2',
		'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
		'image' => 'http://placehold.it/200x200',
		'price' => '2342',
		'services' => [
			'icon-instagram' => 'WiFi',
			'icon-instagram' => 'Electricidad',
			'icon-instagram' => 'Infusiones',
		],
		'rating' => 4.5,
		'ratingCount' => 23,
	], [
		'title' => 'Oficina 3',
		'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
		'image' => 'http://placehold.it/200x200',
		'price' => '2342',
		'services' => [
			'icon-instagram' => 'WiFi',
			'icon-instagram' => 'Electricidad',
			'icon-instagram' => 'Infusiones',
		],
		'rating' => 4.6,
		'ratingCount' => 23,
	], [
		'title' => 'Oficina 4',
		'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
		'image' => 'http://placehold.it/200x200',
		'price' => '2342',
		'services' => [
			'icon-instagram' => 'WiFi',
			'icon-instagram' => 'Electricidad',
			'icon-instagram' => 'Infusiones',
		],
		'rating' => 4.5,
		'ratingCount' => 23,
	], 	[
		'title' => 'Oficina 1',
		'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
		'image' => 'http://placehold.it/200x200',
		'price' => '2342',
		'services' => [
			'icon-instagram' => 'WiFi',
			'icon-instagram' => 'Electricidad',
			'icon-instagram' => 'Infusiones',
		],
		'rating' => 4.5,
		'ratingCount' => 23,
	], [
		'title' => 'Oficina 2',
		'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
		'image' => 'http://placehold.it/200x200',
		'price' => '2342',
		'services' => [
			'icon-instagram' => 'WiFi',
			'icon-instagram' => 'Electricidad',
			'icon-instagram' => 'Infusiones',
		],
		'rating' => 4.5,
		'ratingCount' => 23,
	], [
		'title' => 'Oficina 3',
		'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
		'image' => 'http://placehold.it/200x200',
		'price' => '2342',
		'services' => [
			'icon-instagram' => 'WiFi',
			'icon-instagram' => 'Electricidad',
			'icon-instagram' => 'Infusiones',
		],
		'rating' => 4.6,
		'ratingCount' => 23,
	], [
		'title' => 'Oficina 4',
		'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit',
		'image' => 'http://placehold.it/200x200',
		'price' => '2342',
		'services' => [
			'icon-instagram' => 'WiFi',
			'icon-instagram' => 'Electricidad',
			'icon-instagram' => 'Infusiones',
		],
		'rating' => 4.5,
		'ratingCount' => 23,
	], 
];
?>
	<section class="offices">
		<div class="container">
			<h2>Oficinas destacadas</h2>
			<div class="row office-list">
				<?php foreach ($offices as $office) { ?>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<article class="office">
						<img src="<?php echo $office['image'] ?>" alt="<?php echo $office['title'] ?>">
						<p>
							<strong>$<?php echo $office['price'] ?> ARS</strong>
							<span class="services">
								<?php foreach ($office['services'] as $icon => $desc) { ?>
								<i class="<?php echo $icon ?>" title="<?php echo $desc ?>"></i>
								<?php } ?>	
							</span>
						</p>
						<p><?php echo $office['desc'] ?></p>
						<ul class="stars">
							<?php
								$fullStars = floor($office['rating'] / 2);
								for ($j = $fullStars; $j >= 1 ; $j--) { 
							?>
							<li><i class="icon-star"></i></li>
							<?php 
								} 
								if (($office['rating'] - $fullStars * 2) >= .5) {
							?>
							<li><i class="icon-star-half"></i></li>
							<?php } ?>	
							<li><?php echo $office['ratingCount'] > 0 ? $office['ratingCount'] . ' evaluaciones': 'Se el primero en evaluarla'; ?> </li>
						</ul>
					</article>
				</div>
				<?php } ?>			
			</div>
		</div>
	</section>
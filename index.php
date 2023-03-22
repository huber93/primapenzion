<?php

$idStranky = "domu";

require "./data.php";

//podivame se do url a zjistime, jakou stranku uživatel chce zobrazit
if (array_key_exists("stranka", $_GET)) {
	$idStranky = $_GET["stranka"];
	//musime zjistit, zda takova stranka v databazi je
	if (!array_key_exists($idStranky, $seznamStranek)){
		$idStranky = "404";
	}
} else {
		$idStranky = "domu";
}

?>

<!DOCTYPE html>
<html lang="cs">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Primapenzion | <?php echo $seznamStranek[$idStranky]->getTitulek(); ?></title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/all.min.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

	<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>

<body>
	<header>

		<div class="container">
			<div class="headerTop">
				<a class="tel" href="tel:+420606123456">+420 / 606123456</a>
				<div class="socIkony"><a href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
					<a href="https://instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
					<a href="https://twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a>
				</div>

			</div>

			<a href="domu" class="logo">prima<br />penzion</a>

			<?php require "./menu.php"; ?>
		</div>

		<img src="img/<?php echo $seznamStranek[$idStranky]->getObrazek(); ?>" alt="header obrazek" width="1920" height="530">
	</header>

	<section>

		<!-- Zde budeme echovat obsahy stránek -->
		<?php echo file_get_contents("./$idStranky.html"); ?>

	</section>

	<footer>
		<div class="pata">
		
		<?php require "./menu.php"; ?>

			<a href="domu" class="logo">prima<br />penzion</a>
			<div class="pataInfo">
				<div class="adresa"><i class="fa-solid fa-location-dot"></i><a href="https://goo.gl/maps/ag2DxEpJMyzYSZJ36" target="_blank"> PrimaPenzion, Jablonského 2, Praha 7</a></div>

				<div class="tel"><a href="tel: +420606123456"><i class="fa-solid fa-phone"></i></a>
					<a href="tel: +420606123456">+420 / 606 123 456</a>
				</div>
				<i class="fa-regular fa-envelope"></i>
				<span>info@primapenzion.cz</span>
			</div>
			<div class="socIkony"><a href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
				<a href="https://instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
				<a href="https://twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a>
			</div>
		</div>

		<div class="copy">
			&copy; PrimaPenzion 2023
		</div>
	</footer>


</body>

</html>
<?php
	session_start();
	require "fonctions/function_boutique.php";
	$var = new boutique;
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css"/>
		<title>Accueil - Camara Photo</title>
	</head>

	<body>
		<header>
			<?php include "header.php"; ?>
		</header>
		
		<section id="img_accueil">
			<h2 id="message_accueil">Bienvenue chez CAMARA PHOTO</h2>
		</section>
		
		<main>
			<section id='produits'>
				<h1>NOS PRÉFÉRÉES</h1>
				<section id='produits_list'>
					<?php $var->accueil(); ?>
				</section>
			</section>
		</main>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
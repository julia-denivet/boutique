<?php
	session_start();
	if($_SESSION["id_droits"] == 1337){}
	else{
		header('Location: ../index.php');
	}
	require "fonctions/function_admin.php";
	$var = new admin;
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../style.css"/>
		<title>Admin - Camara Photo</title>
	</head>

	<body>
		<header>
			<?php include "header.php"; ?>
		</header>
		
		<main>
			<h1 id="titre_admin">ADMINISTRATEUR</h1>
			<section id="admin">
				<section class="block_admin"><?php include "script/block_gestion_favoris.php"; ?></section>
				<section class="block_admin"><?php include "script/block_gestion_produit.php"; ?></section>
				<section class="block_admin"><?php include "script/block_gestion_categorie.php"; ?></section>
				<section class="block_admin"><?php include "script/block_gestion_utilisateur.php"; ?></section>
			</section>
		</main>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
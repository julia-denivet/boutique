<?php
	if(isset($_GET['id'])){}
	else
	{
		header('Location: index.php');
	}
	session_start();
	require "fonctions/function_boutique.php";
	$var = new boutique;
	$produit = $var->produit($_GET['id']);
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css"/>
		<title><?php echo $produit['nom'] ?> - Camara Photo</title>
	</head>

	<body>
		<header>
			<?php include "header.php"; ?>
		</header>
		
		<main>
			<h1 id="titre_produit"><?php echo $produit['nom'] ?></h1>
			
			<secteur id="haut_de_page_produit">
				<secteur id="block_image_produit">
					<img alt="<?php echo $produit["nom"] ?>" src="<?php echo $produit["img_folder"]?>/<?php echo $produit["img"]?>" id="image_produit"/>
				</secteur>
				
				<section id="prix_produit">
					
				</section>
			</secteur>
		</main>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
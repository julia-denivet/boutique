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
		
		<main id="fiche_produit">
			<h1 id="titre_produit"><?php echo $produit['nom'] ?></h1>
			
			<section id="block_droit_produit">
				<section id="block_image_produit">
					<img alt="<?php echo $produit["nom"] ?>" src="<?php echo $produit["img_folder"]?>/<?php echo $produit["img"]?>" id="image_produit"/>
				</section>

				<section id="prix_produit">
					<h3>Prix TTC : <?php echo $produit["prix_ttc"] ?> €</h3>
					<h4>Prix HT : <?php echo $produit["prix_ht"] ?> €</h4>
					<form method="post">
						<label>Quantité : </label>
						<select name="quantite">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</form>
					<a href='' class='ajout_panier'>Ajouter au panier</a>
				</section>
			</section>

			<section id="block_description_produit">
				<div class="description_produit">
					<?php echo $produit["description"] ?>
					<?php echo $produit["description"] ?>
					<?php echo $produit["description"] ?>
				</div>
			</section>
		</main>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
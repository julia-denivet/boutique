<?php
	if(isset($_GET['id'])){}
	else
	{
		header('Location: index.php');
	}
	session_start();
	require "fonctions/function_boutique.php";
	$var = new boutique;
	$data = $var->produit($_GET['id']);
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css"/>
		<title><?php echo $data['nom'] ?> - Camara Photo</title>
	</head>

	<body>
		<header>
			<?php include "header.php"; ?>
		</header>
		
		<main id="fiche_produit">
			<h1 class="titre"><?php echo $data['nom'] ?></h1>
			
			<section id="block_haut_produit">
				<section id="block_image_produit">
					<img alt="<?php echo $data["nom"] ?>" src="<?php echo $data["img_folder"]?>/<?php echo $data["img"]?>" id="image_produit"/>
				</section>

				<section id="prix_produit">
					<h3>Prix TTC : <?php echo $data["prix_ttc"] ?> €</h3>
					<h4>Prix HT : <?php echo $data["prix_ht"] ?> €</h4>
					<?php 
						include "script/bouton_quantite_panier.php";
					?>
				</section>
			</section>

			<section id="block_description_produit">
				<div id="description_produit">
					<?php echo nl2br($data["description"]) ?>
				</div>
			</section>
			
			<section id="block_commentaire_produit">
				<div id="ajout_commentaire_produit">
					<h2>Ajoutez un commentaire</h2>
					<?php $var->ajout_commentaire_produit($_GET['id']); ?>
				</div>
				<div id="affichage_commentaire_produit">
					<?php $var->affichage_commentaire_produit($_GET['id']); ?>
				</div>
			</section>
		</main>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
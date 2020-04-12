<?php
	session_start();
	if(isset($_SESSION['login'])){
		if(isset($_POST['commande']) && $_POST['prix'] != 0){}
		else{
			header('Location: panier.php');
		}
	}
	else{
		header('Location: connexion.php');
	}
	require "fonctions/function_commande.php";
	$var = new commande;	
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css"/>
		<title>Validation commande - Camara Photo</title>
	</head>

	<body>
		<header>
			<?php include "header.php"; ?>
		</header>
		
		<main>
			<h1 class="titre">VALIDATION COMMANDE</h1>
			<section id="validation_commande">
				<section class="partie_commande">
					<h2>Produits</h2>
					<div class="partie_commande_contenu">
						<?php $var->affichage_commande(); ?>
					</div>
				</section>
				
				<form method="post">
					<section id="partie_commande_adresse">
						<section class="partie_commande_adresse_fact_livr">
							<h2>Adresse facturation</h2>

							<div class="partie_commande_contenu_adresse">
								<?php $var->adresse_commande_facturation(); ?>
							</div>
						</section>

						<section class="partie_commande_adresse_fact_livr">
							<h2>Adresse livraison</h2>
							<div class="partie_commande_contenu_adresse">
								<?php $var->adresse_commande_livraison(); ?>
							</div>
						</section>
					</section>

					<section class="partie_commande">
						<h2>Moyen de paiment</h2>
						<div class="partie_commande_contenu" id="partie_commande_contenu_paiment">
							<?php $var->paiment_commande(); ?>
						</div>
					</section>

					<section id="partie_commande_validation">
						<input type="hidden" name="prix" value="<?php echo $_POST['prix']; ?>"/>
						<input type="submit" name="valid_command" value="VALIDER LA COMMANDE"/>
						<?php $var->validation_commande(); ?>
					</section>
				</form>
			</section>
		</main>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
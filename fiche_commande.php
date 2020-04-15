<?php
	session_start();
	if(!empty($_GET['num_commande']))
	{
		if(isset($_SESSION['login']) || isset($_SESSION['password'])){}
		else
		{
			header('Location: index.php');
		}	
	}
	else
	{
		header('Location: index.php');
	}
	require "fonctions/function_profil.php";
	$var = new profile;
	$query = $var->donnees_profil_commande($_GET['num_commande']);
	$data = mysqli_fetch_array($query);
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css"/>
		<title><?php echo $data['numero_commande'] ?> - Camara Photo</title>
	</head>

	<body>
		<header>
			<?php include "header.php"; ?>
		</header>
		
		<main>
			<section id="fiche_commande">
				<div id="fiche_commande_numero">Facture numéro : <?php echo $data['numero_commande']; ?></div>
				<div id="fiche_commande_date">Date: <?php echo date('d/m/Y', strtotime($data['date'])); ?></div>
				<div id="fiche_commande_adresse">Adresse de facturation :<br/><br/><?php echo nl2br($data['adresse_facturation']); ?></div>
				<div id="fiche_commande_adresse">Adresse de livraison :<br/><br/><?php echo nl2br($data['adresse_livraison']); ?></div>
				
				<div id="fiche_commande_produit">
					<section id="fiche_commande_produit_titre">
						<div class="fiche_commande_nom">Nom</div>
						<div class="fiche_commande_prix">Prix</div>
						<div class="fiche_commande_quantite">Quantité</div>
					</section>
					<?php
						mysqli_data_seek($query, 0);
						while($data = mysqli_fetch_array($query))
						{
					?>
							<section class="fiche_commande_produit">
								<div class="fiche_commande_nom"><?php echo $data['nom']; ?></div>
								<div class="fiche_commande_prix"><?php echo $data['prix_produit'], ' €'; ?></div>
								<div class="fiche_commande_quantite"><?php echo $data['quantite']; ?></div>
							</section>
					<?php
						}
						mysqli_data_seek($query, 0);
						$data = mysqli_fetch_array($query);
					?>
				</div>

				<div id="fiche_commandes_prix_total">Prix total : <?php echo $data['prix_total'], ' €'; ?></div>
			</section>
		</main>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
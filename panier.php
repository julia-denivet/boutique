<?php
	session_start();
	if(isset($_SESSION['login'])){}
	else{
		header('Location: connexion.php');
	}
	require "fonctions/function_panier.php";
	$var = new panier;
	if(isset($_POST['ajout_panier']))
	{
		$var->ajout_article($_POST['id_produit'], $_POST['quantite'], $_SESSION['id']);
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css"/>
		<title>Panier - Camara Photo</title>
	</head>

	<body>
		<header>
			<?php include "header.php"; ?>
		</header>
		
		<main>
			<h1>PANIER</h1>
			<section id="panier">
				<section id="panier_produit">
					<?php
						$prix = $var->affichage_panier();
					?>
				</section>
				<section id="commande">
					<h3 style="font-family: Roboto">Sous-total : <span style="color: #e4332b"><?php echo $prix; ?> €</span></h3>
					<h3 style="font-family: Roboto">Livraison : <span style="color: #e4332b">5.00 €</span></h3>
					<br />
					<h2 style="font-family: Roboto">Total : <span style="color: #e4332b"><?php echo $prix + 5; ?> €</span></h2>
					<form method="post">
						<input type="button" class="ajout_panier" name="commande" value="Passer la commande"/>
					</form>
				</section>
			</section>
		</main>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
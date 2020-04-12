<?php
	session_start();
	if(isset($_SESSION['login']) || isset($_SESSION['password'])){}
	else
	{
		header('Location: index.php');
	}
    require "fonctions/function_profil.php";
	$var = new profile;
	$query = $var->donnees_profil();
?>
<html>
    <head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css"/>
        <title>Profil - Boutique</title>
    </head>
	
    <body>
        <header>
            <?php include "header.php"; ?>
		</header>
		
		<main>
			<h1 class="titre">ESPACE PROFIL</h1>
			<section id="profil">
				<section class="block_profil">
					<h1>Profil</h1>
					<div class="block_profil_contenu">
						<?php include 'script/block_modif_profil.php'; ?>
					</div>
				</section>

				<section class="block_profil">
					<h1>Adresses</h1>
					<div class="block_profil_contenu">
						<?php include 'script/block_modif_adresse.php'; ?>
						<?php include 'script/block_ajout_adresse.php'; ?>
					</div>
				</section>
				
				<section class="block_profil">
					<h1>Commandes</h1>
					<div class="block_profil_contenu">
						<?php include 'script/block_affichage_commande.php'; ?>
					</div>
				</section>
			</section>
		</main>
		
    	<footer>
			<?php include "footer.php"; ?>
		</footer>
    </body>
</html>
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
		<title>Nouveau produit - Camara Photo</title>
	</head>

	<body>
		<header>
			<?php include "header.php"; ?>
		</header>
		
		<main>
			<h1 class="titre_admin">NOUVEAU PRODUIT</h1>
			<div class="admin_gestion_produit">
				<form method="post" enctype="multipart/form-data">
					<input type="text" name="nom" placeholder="Nom"/>
					<textarea name="description" placeholder="Description"></textarea>
					<select name="sous_categorie">
						<option value="0" selected>Catégorie</option>
						<?php $var->liste_sous_categorie(""); ?>
					</select>
					<input type="text" name="prix_ht" placeholder="Prix HT"/>
					<input type="text" name="prix_ttc" placeholder="Prix TTC"/>
					<input type="text" name="stock" placeholder="Stock"/>
					<input type="file" name="image" accept="image/png, image/jpeg, image/jpg">
					<input type="submit" name="nouveau_produit" value="Ajouter"/>
				</form>
				<?php
					if(isset($_POST['nouveau_produit']))
					{
						$var->ajouter_produit($_POST['nouveau_produit'], $_POST['nom'], $_POST['description'], $_POST['sous_categorie'], $_POST['prix_ht'], $_POST['prix_ttc'], $_POST['stock'], $_FILES['image']['tmp_name'], $_FILES['image']['type'], $_FILES['image']['name']);
					}
				?>
			</div>
		</main>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
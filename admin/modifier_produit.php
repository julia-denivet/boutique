<?php
	session_start();
	if($_SESSION["id_droits"] == 1337){}
	else{
		header('Location: ../index.php');
	}
	require "fonctions/function_admin.php";
	$var = new admin;
	$data = $var->data_produit($_GET['id']);
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../style.css"/>
		<title><?php echo $data['nom']; ?> - Camara Photo</title>
	</head>

	<body>
		<header>
			<?php include "header.php"; ?>
		</header>
		
		<main id="modif_produit">
			<h1 id="titre_admin"><?php echo $data['nom']; ?></h1>
			<form method="post" enctype="multipart/form-data">
				<section id="modif_produit_section_img">
					<label for="modif_produit_img_file" id="modif_produit_img_label"><img id="modif_produit_img" src="../<?php echo $data['img_folder'], "/", $data['img']; ?>"></label>
					<input type="file" id="modif_produit_img_file" name="image" accept="image/png, image/jpeg, image/jpg">
				</section>
				<input type="text" name="nom" value="<?php echo $data['nom']; ?>" placeholder="Nom"/>
				<textarea name="description" placeholder="Description"><?php echo $data['description']; ?></textarea>
				<select name="sous_categorie">
					<?php $var->liste_sous_categorie($data['id_sous_categorie']); ?>
				</select>
				<input type="text" name="prix_ht" value="<?php echo $data['prix_ht']; ?>" placeholder="Prix HT"/>
				<input type="text" name="prix_ttc" value="<?php echo $data['prix_ttc']; ?>" placeholder="Prix TTC"/>
				<input type="hidden" name="id_produit" value="<?php echo $_GET['id']; ?>"/>
				<input type="submit" name="modifier_produit" value="Modifier"/>
			</form>
			<?php
				if(isset($_POST['modifier_produit']))
				{
					$var->modif_produit($_POST['id_produit'], $_POST['modifier_produit'], $_POST['nom'], $_POST['description'], $_POST['sous_categorie'], $_POST['prix_ht'], $_POST['prix_ttc'], $_FILES['image']['tmp_name'], $_FILES['image']['type'], $_FILES['image']['name']);
				}
			
			?>
		</main>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
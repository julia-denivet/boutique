<?php
	if (isset($_POST['submit'])) 
	{
		$connexion = mysqli_connect('localhost','root','','boutique');
		$sql = "INSERT INTO panier (id_utilisateur, id_produit, quantite) VALUES (".$_SESSION['id'].",".$_GET['id'].", 1);";
		$query = mysqli_query($connexion,$sql);
		header('location: index.php');

	}
	if(isset($_GET['id'])){}
	else
	{
		header('Location: index.php');
	}
	session_start();
	require "fonctions/function_boutique.php";
	$var = new boutique;
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css"/>
		<title>Boutique - Camara Photo</title>
	</head>

	<body>
		<header>
			<?php include "header.php"; ?>
		</header>
		
		<main>
			<?php $name_categorie = $var->name_categorie($_GET["id"]);?>
			
			<section id='produits'>
				<h1><?php echo $name_categorie['name'] ?></h1>
				<section id='produits_list'>
					<?php
						$var->produit_par_categorie($_GET["id"]);
					?>
				</section>
			</section>
		</main>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
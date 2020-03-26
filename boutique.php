<?php
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
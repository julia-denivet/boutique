<?php
	if(isset($_GET['recherche'])){}
	else
	{
		header('Location: index.php');
	}
	session_start();
	require "fonctions/function_recherche.php";
	$var = new barre_recherche;
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css"/>
		<title><?php echo $_GET['recherche']; ?> - Camara Photo</title>
	</head>

	<body>
		<header>
			<?php include "header.php"; ?>
		</header>
		
		<main>
			<section id='produits'>
				<h1>Recherche : <?php echo $_GET['recherche'] ?></h1>
				<section id='produits_list'>
					<?php
						$var->recherche($_GET['recherche']);
					?>
				</section>
			</section>
		</main>
		
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
<?php
	session_start();
	if(!isset($_SESSION['login']) || !isset($_SESSION['password'])){}
	else
	{
		header('Location: index.php');
	}
	require "fonctions/function_co_ins.php";
	$var = new connexion_inscription;
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css"/>
		<title>Connexion - Boutique en ligne</title>
	</head>
	
	<body>
		<header>
			<?php include "header.php"; ?>
		</header>
			
		<main id="connexion">
			<div id="connexion_form">
				<div class="wrapper_2">
					<h3>Connexion</h3>
					<form class="profil" method="post">
						<input type="text" class="e_button" name="login" placeholder="LOGIN"/>
						<input type="password" class="e_button" name="passe" placeholder="MOT DE PASSE"/>
						<input type="submit" class="e_button" value="CONNEXION" name="Connexion"/>
						<input type="submit" class="e_button" value="INSCRIPTION" name="inscription" />
						<?php
							$var->connexion();
						?>
					</form>
				</div>
			</div>
		</main>
			
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
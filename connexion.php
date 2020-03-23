<?php

	session_start();
	if(!isset($_SESSION['login']) || !isset($_SESSION['password'])){}
	else
	{
		header('Location: index.php');
	}
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
							require("function.php");
							$var = new boutique();
							$var->connexion();
						?>
					</form>
				</div>
			</div>
		</main>
			
		<footer>
			
		</footer>
	</body>
</html>
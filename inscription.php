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
		<title>Inscription - Blog</title>
	</head>
	
	<body>
		<header>
			<?php include "header.php"; ?>
		</header>
		
		<main id="inscription">
			<div id="inscription_form">
				<div class="wrapper_2">
					<h3>Inscription</h3>
					<form class="profil" method="post" enctype="multipart/form-data">
						<div class="inscription_form_partie">
							<input class="e_button" type="text" name="login" placeholder="LOGIN"/>
							<input class="e_button" type="password" name="passe" placeholder="MOT DE PASSE"/>
                        </div>
                        <div class="inscription_form_partie">
                            <input class="e_button" type="text" name="nom" placeholder="NOM"/>
                            <input class="e_button" type="password" name="passe2" placeholder="CONFIRMATION MOT DE PASSE"/>
						</div>
						<div class="inscription_form_partie">
                            <input class="e_button" type="mail" name="email" placeholder="E-MAIL"/>
                            <input class="e_button" type="text" name="prenom" placeholder="PRENOM"/>
							
						</div>
						<input class="e_button" type="submit" value="INSCRIPTION" name="inscription"/>
						<input type="submit" class="e_button" value="CONNEXION" name="connexion"/>
						<?php
							$var->inscription();
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
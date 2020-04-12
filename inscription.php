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
			<?php include "header.php";?>
		</header>
		
		<main id="co_ins">
			<section id="co_ins_section_blanc">
				<form method="post">
					<fieldset>
						<legend>INSCRIPTION</legend>
						<input type="text" class="co_ins_input" name="login" placeholder="LOGIN"/>
						<input type="mail" class="co_ins_input" name="email" placeholder="E-MAIL"/>
						<input type="text" class="co_ins_input" name="prenom" placeholder="PRENOM"/>
						<input type="text" class="co_ins_input" name="nom" placeholder="NOM"/>
						<input type="password" class="co_ins_input" name="passe" placeholder="MOT DE PASSE"/>
						<input type="password" class="co_ins_input" name="passe2" placeholder="CONFIRMATION MOT DE PASSE"/>
						<input type="submit" class="co_ins_input_bouton" value="INSCRIPTION" name="inscription"/>
						<input type="submit" class="co_ins_input_bouton" value="CONNEXION" name="connexion"/>
					</fieldset>
				</form>
				<?php
					$var->inscription();
				?>
			</section>
		</main>
			
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
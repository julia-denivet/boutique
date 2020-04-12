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
			
		<main id="co_ins">
			<section id="co_ins_section_blanc">
				<form method="post">
					<fieldset>
						<legend>INSCRIPTION</legend>
						<input type="text" class="co_ins_input" name="login" placeholder="LOGIN"/>
						<input type="password" class="co_ins_input" name="passe" placeholder="MOT DE PASSE"/>
						<input type="submit" class="co_ins_input_bouton" value="CONNEXION" name="Connexion"/>
						<input type="submit" class="co_ins_input_bouton" value="INSCRIPTION" name="inscription" />
					</fieldset>
				</form>
				<?php
					$var->connexion();
				?>
			</section>
		</main>
			
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>
</html>
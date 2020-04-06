<?php
	session_start();
	if(isset($_SESSION['login']) || isset($_SESSION['password'])){}
	else
	{
		header('Location: index.php');
	}
    require "fonctions/function_profil.php";
	$var = new profile;
?>
<html>
    <head>

		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css"/>
        <title>Profil - Boutique</title>
        
    </head>
    <body>
        <header>
            <?php include "header.php"; ?>
        </header>
    <div>
        
        <h3>Profil</h3>
		<form  method="post">
						<div>
							<input type="text" name="login" placeholder="LOGIN"/>
							<input type="password" name="passe" placeholder="MOT DE PASSE"/>
                        </div>
                        <div>
                            <input type="text" name="nom" placeholder="NOM"/>
                            <input type="password" name="passe2" placeholder="CONFIRMATION MOT DE PASSE"/>
						</div>
						<div>
                            <input type="mail" name="email" placeholder="E-MAIL"/>
                            <input type="text" name="prenom" placeholder="PRENOM"/>
							
						</div>
						<input type="submit" class="e_button" value="MODIFIER" name="Modifier"/>
						<?php
							$var->profil();
						?>
					</form>
				</div>
    </body>
</html>
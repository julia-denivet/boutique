<?php
	session_start();
	if(isset($_SESSION['login']) || isset($_SESSION['password'])){}
	else
	{
		header('Location: index.php');
	}
    require "fonctions/function_profil.php";
	$var = new profile;

	$connexion = mysqli_connect('localhost','root','','boutique');
	$sql = "SELECT * FROM utilisateurs WHERE login = '".$_SESSION['login']."'";
	$query = mysqli_query($connexion, $sql);
	
	

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
		<main>
			<div>
				<h3>Profil</h3>
				<form  method="post">
					<?php 
						while ($data = mysqli_fetch_assoc($query))
							{ 
					?>
					<div>
						<input type="text" name="login" placeholder="LOGIN" value="<?php echo $data['login'] ?> "/>
						<input type="password" name="passe" placeholder="MOT DE PASSE" value="<?php echo $data['password'] ?>"/>
					</div>
					<div>
						<input type="text" name="nom" placeholder="NOM" value="<?php echo $data['nom'] ?>" >
						<input type="password" name="passe2" placeholder="CONFIRMATION MOT DE PASSE" value="<?php echo $data['password'] ?>"/>
					</div>
					<div>
						<input type="mail" name="email" placeholder="E-MAIL" value="<?php echo $data['email'] ?>"/>
						<input type="text" name="prenom" placeholder="PRENOM" value="<?php echo $data['prenom'] ?>"/>
									
					</div>
						<input type="submit" class="e_button" value="MODIFIER" name="Modifier"/>
							<?php
								$var->profil();
							?>
				</form>
				<?php
							}
				?>
			</div>
		</main>
    	<footer>
			<?php include "footer.php"; ?>
		</footer>
    </body>
</html>
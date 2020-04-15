<?php
	require "fonctions/function_header.php";
	$header = new header;
?>

<img alt="logo_camara" id="logo_camara" src="Image/Logo/camara_brest_ok2.png"/>

<form action="recherche.php" method="GET" id="recherche">
	<input type="search" name="recherche" id="barre_recherche" placeholder="Recherche..." />
	<button type="submit" id="bouton_recherche" title="Rechercher"><img src="Image/Logo/recherche.png" id="img_bouton_recherche" alt="logo_recherche"/></button>
</form>

<nav>
	<ul id="menu">
		<li><a href="index.php" class="titre_menu">ACCUEIL</a></li>
		<li class="deroulant"><a class="titre_menu">BOUTIQUE</a>
			<ul class="sous">
				<?php $header->categorie(); ?>
			</ul>
		</li>
		<li><a href="contact.php" class="titre_menu">CONTACT</a></li>
		<?php
			if(isset($_SESSION['id']))
			{
				echo "
				<li class='deroulant'><a><img alt='logo_profil' id='logo_menu' src='Image/Logo/profil.png'/></a>
					<ul class='sous'>
						<li class='sous_deroulant'><a href='profil.php'>Profil</a></li>";
						if($_SESSION['id_droits'] == 1337)
						{
							echo "<li class='sous_deroulant'><a href='admin/admin.php'>Admin</a></li>";
						}
						echo "
						<li class='sous_deroulant'><a href='deconnexion.php'>Déconnexion</a></li>
					</ul>
				</li>
				<li class='deroulant'><a href='panier.php'><img alt='logo_panier' id='logo_menu' src='Image/Logo/panier.png'/></a></li>
				";
			}
			else
			{
				echo "
				<li class='deroulant'><a href='connexion.php'><img alt='logo_profil' id='logo_menu' src='Image/Logo/profil.png'/></a></li>
				";
			}
		?>
	</ul>
</nav>